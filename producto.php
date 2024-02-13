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

    $consultaDatos = "SELECT color, fondo FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultadoDatos = mysqli_query($conexion, $consultaDatos);

    if ($resultadoDatos && $fila = mysqli_fetch_assoc($resultadoDatos)) {
      $colorFondo = $fila['color'];
      $fondo =  $fila['fondo'];
    } else {
    
      $fondo = 'linear-gradient(#141e30, #243b55)';
      $colorFondo = '#fcf9f4';
    }

    if ($loggedIn && $id_juego) {
        $consulta = "SELECT p.id, p.nombre, p.descripcion, p.cantidad, p.precio, p.imagen
                    FROM marketplace p
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
        header("Location: login.php");
        exit();
    }

    mysqli_close($conexion);
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="./styles/compra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
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

<body id="bodyBackground" style="background-color: <?php echo $colorFondo; ?>; background-image: url('<?php echo $fondo; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center top;background-attachment: fixed;">
<div class="spinner-overlay">
    <div class="spinner">
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.spinner-overlay').style.display = 'block';
        });
        window.addEventListener('load', function() {
            document.querySelector('.spinner-overlay').style.display = 'none';
        });
        window.addEventListener('beforeunload', function(event) {
            document.querySelector('.spinner-overlay').style.display = 'none';
        });
        </script>
    </div>
</div>
    <div style="background-color: #0A1880; border-bottom: 10px solid #5436bf;">
        <br>
        <h2 class="h1"><center>Confirmar Compra</center></h2>
        <br>
    </div>
    <br><br>
    <div class="borde">
        <img class="imagen"src="<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>">
        <div class="texto-contenedor">
            <h2 class="nombre-juego"><?php echo $fila['nombre']; ?></h2>
            <p>Precio unitario: <?php echo $fila['precio']; ?></p>
        </div>
        <div class="factura"> 
            <form action="procesar_compra2.php" method="post">
                <input type="hidden" name="id_juego" value="<?php echo $fila['id']; ?>">
                <input class="hidden" type="hidden" name="nombre_juego" value="<?php echo $fila['nombre']; ?>">
                <input type="hidden" name="imagen_juego" value="<?php echo $fila['imagen']; ?>">
                <input type="hidden" name="precio_unitario" value="<?php echo $fila['precio']; ?>">

                <div class="user-box">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="<?php echo $fila['cantidad']; ?>" onchange="calcularPrecioTotal()" required><br><br>
                </div>

                <div class="user-box">
                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" value="<?php echo htmlspecialchars($ubicacionUsuario); ?>" required><br><br>
                </div>

                <div class="user-box">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($direccionUsuario); ?>" required><br><br>
                </div>
                </div>
    </div>
                
                <label class="contenedor">
                    <input type="checkbox" name="terminos" required> 
                    <span class="t">Acepto los términos y condiciones</span><br><br>
                    <div class="checkmark"></div>
                </label>
                <div class="compra">
                    <div class="texto-precio">
                        <p><?php echo $fila['nombre']; ?></p>
                        <label class="texto-precio" id="precio-total">Precio total: $<?php echo $fila['precio']; ?></label>
                    </div>
                    <div class="pbutton">
                        <button class="btn4" type="submit" name="confirmar">Comprar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
