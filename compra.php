<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $loggedIn = true;
    $id_juego = isset($_GET['id']) ? $_GET['id'] : null;

    if ($loggedIn && $id_juego) {
        $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, c.id as categoria_id, c.nombre as categoria_nombre
                    FROM productos p
                    LEFT JOIN categorias c ON p.categoria = c.id
                    WHERE p.id = ?";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id_juego);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $fila = mysqli_fetch_assoc($resultado);

            // Consulta para obtener la ubicación del usuario
            $consultaUbicacion = "SELECT ubicacion FROM usuarios WHERE nombre = ?";
            $stmtUbicacion = mysqli_prepare($conexion, $consultaUbicacion);
            mysqli_stmt_bind_param($stmtUbicacion, "s", $nombreUsuario);
            mysqli_stmt_execute($stmtUbicacion);
            $resultadoUbicacion = mysqli_stmt_get_result($stmtUbicacion);

            if ($resultadoUbicacion && mysqli_num_rows($resultadoUbicacion) > 0) {
                $filaUbicacion = mysqli_fetch_assoc($resultadoUbicacion);
                $ubicacionUsuario = $filaUbicacion['ubicacion'];
            } else {
                $ubicacionUsuario = ''; 
            }

            // Consulta para obtener la dirección del usuario
            $consultaDireccion = "SELECT direccion FROM usuarios WHERE nombre = ?";
            $stmtDireccion = mysqli_prepare($conexion, $consultaDireccion);
            mysqli_stmt_bind_param($stmtDireccion, "s", $nombreUsuario);
            mysqli_stmt_execute($stmtDireccion);
            $resultadoDireccion = mysqli_stmt_get_result($stmtDireccion);

            if ($resultadoDireccion && mysqli_num_rows($resultadoDireccion) > 0) {
                $filaDireccion = mysqli_fetch_assoc($resultadoDireccion);
                $direccionUsuario = $filaDireccion['direccion'];
            } else {
                $direccionUsuario = ''; 
            }
        } else {
            echo '<p>No se encontró el juego.</p>';
        }
    } else {
        header("Location: index.php");
        exit();
    }

    mysqli_close($conexion);
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra</title>
    <!-- mari tus estilos CSS aquí -->
    <script>
    function calcularPrecioTotal() {
        var precioUnitario = <?php echo $fila['precio']; ?>;
        var cantidad = document.getElementById('cantidad').value;
        var precioTotal = precioUnitario * cantidad;
        document.getElementById('precio-total').textContent = 'Precio total: $' + precioTotal.toFixed(2);
    }
    </script>
</head>
<body>
    <h1>Confirmar Compra</h1>
    <div>
        <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>">
        <p>Nombre: <?php echo $fila['nombre']; ?></p>
        <p>Precio unitario: <?php echo $fila['precio']; ?></p>
    </div>
    <form action="procesar_compra.php" method="post">
        <input type="hidden" name="id_juego" value="<?php echo $fila['id']; ?>">
        <input type="hidden" name="nombre_juego" value="<?php echo $fila['nombre']; ?>">
        <input type="hidden" name="imagen_juego" value="<?php echo $fila['imagen']; ?>">
        <input type="hidden" name="precio_unitario" value="<?php echo $fila['precio']; ?>">
        <input type="checkbox" name="terminos" required> Acepto los términos y condiciones<br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="1" min="1" onchange="calcularPrecioTotal()" required><br><br>

        <label id="precio-total">Precio total: $<?php echo $fila['precio']; ?></label><br><br>

        <label for="ubicacion">Ubicación:</label>
        <input type="text" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($ubicacionUsuario); ?>" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($direccionUsuario); ?>" required><br><br>
        <button type="submit" name="confirmar">Comprar</button>
    </form>
</body>
</html>
