<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $loggedIn = true;

    // Consulta para obtener los juegos en el carrito del usuario
    $consulta_carrito = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, c.id as categoria_id, c.nombre as categoria_nombre
                    FROM productos p
                    LEFT JOIN categorias c ON p.categoria = c.id
                    INNER JOIN carrito car ON p.id = car.id_producto
                    INNER JOIN usuarios u ON car.id_usuario = u.id
                    WHERE u.nombre = ?";

    $stmt_carrito = mysqli_prepare($conexion, $consulta_carrito);
    mysqli_stmt_bind_param($stmt_carrito, "s", $nombreUsuario);
    mysqli_stmt_execute($stmt_carrito);
    $resultado_carrito = mysqli_stmt_get_result($stmt_carrito);

    // Consulta para obtener la ubicación y dirección del usuario
    $consultaUbicacionDireccion = "SELECT ubicacion, direccion FROM usuarios WHERE nombre = ?";
    $stmtUbicacionDireccion = mysqli_prepare($conexion, $consultaUbicacionDireccion);
    mysqli_stmt_bind_param($stmtUbicacionDireccion, "s", $nombreUsuario);
    mysqli_stmt_execute($stmtUbicacionDireccion);
    $resultadoUbicacionDireccion = mysqli_stmt_get_result($stmtUbicacionDireccion);

    if ($resultadoUbicacionDireccion && mysqli_num_rows($resultadoUbicacionDireccion) > 0) {
        $filaUbicacionDireccion = mysqli_fetch_assoc($resultadoUbicacionDireccion);
        $ubicacionUsuario = $filaUbicacionDireccion['ubicacion'];
        $direccionUsuario = $filaUbicacionDireccion['direccion'];
    } else {
        $ubicacionUsuario = ''; 
        $direccionUsuario = ''; 
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
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Confirmar Compra</title>
</head>
<body>

<h2>Confirmar Compra</h2>

<?php
$totalPrecio = 0; // Variable para almacenar el precio total inicializado en 0

if ($resultado_carrito && mysqli_num_rows($resultado_carrito) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado_carrito)) {
        // Sumar el precio de cada juego al total
        $totalPrecio += $fila['precio'];
?>
    <div class="item-carrito">
        <img src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>">
        <p>Nombre: <?php echo $fila['nombre']; ?></p>
        <p>Precio: <?php echo $fila['precio']; ?> COP</p> <!-- Agregamos "COP" al final del precio -->
    </div>
<?php
    }
} else {
    echo '<p>No hay juegos en tu carrito.</p>';
}
?>

<form action="procesar_compra_carrito.php" method="post">
<p>Precio total: <?php echo $totalPrecio," COP"; ?></p>
    <?php if (!empty($ubicacionUsuario)) : ?>
        <label>
            Ubicación:
            <input type="text" name="ubicacion" value="<?php echo $ubicacionUsuario; ?>">
        </label>
    <?php endif; ?>
    <?php if (!empty($direccionUsuario)) : ?>
        <label>
            Dirección:
            <input type="text" name="direccion" value="<?php echo $direccionUsuario; ?>">
        </label>
    <?php endif; ?>
    <label>
        <input type="checkbox" name="terminos" required> 
        Acepto los términos y condiciones
    </label>
    <button type="submit" name="confirmar">Confirmar Compra</button>
</form>

</body>
</html>
