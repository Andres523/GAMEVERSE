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
    <link rel="shortcut icon" href="../img/logo.png">
    
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
<div class="spinner-overlay">
    <div class="spinner">
    


        <style>

        .spinner:before {
        transform: rotateX(60deg) rotateY(45deg) rotateZ(45deg);
        animation: 750ms rotateBefore infinite linear reverse;
        }

        .spinner:after {
        transform: rotateX(240deg) rotateY(45deg) rotateZ(45deg);
        animation: 750ms rotateAfter infinite linear;
        }

        .spinner:before,
        .spinner:after {
        box-sizing: border-box;
        content: '';
        display: block;
        position: absolute;
        margin-top: -5em;
        margin-left: -5em;
        width: 10em;
        height: 10em;
        transform-style: preserve-3d;
        transform-origin: 50%;
        transform: rotateY(50%);
        perspective-origin: 50% 50%;
        perspective: 300px;
        background-size: 10em 10em;
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjI2NnB4IiBoZWlnaHQ9IjI5N3B4IiB2aWV3Qm94PSIwIDAgMjY2IDI5NyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CiAgICA8dGl0bGU+c3Bpbm5lcjwvdGl0bGU+CiAgICA8ZGVzY3JpcHRpb24+Q3JlYXRlZCB3aXRoIFNrZXRjaCAoaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoKTwvZGVzY3JpcHRpb24+CiAgICA8ZGVmcz48L2RlZnM+CiAgICA8ZyBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBza2V0Y2g6dHlwZT0iTVNQYWdlIj4KICAgICAgICA8cGF0aCBkPSJNMTcxLjUwNzgxMywzLjI1MDAwMDM4IEMyMjYuMjA4MTgzLDEyLjg1NzcxMTEgMjk3LjExMjcyMiw3MS40OTEyODIzIDI1MC44OTU1OTksMTA4LjQxMDE1NSBDMjE2LjU4MjAyNCwxMzUuODIwMzEgMTg2LjUyODQwNSw5Ny4wNjI0OTY0IDE1Ni44MDA3NzQsODUuNzczNDM0NiBDMTI3LjA3MzE0Myw3NC40ODQzNzIxIDc2Ljg4ODQ2MzIsODQuMjE2MTQ2MiA2MC4xMjg5MDY1LDEwOC40MTAxNTMgQy0xNS45ODA0Njg1LDIxOC4yODEyNDcgMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IDE0NS4yNzczNDQsMjk2LjY2Nzk2OCBDMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IC0yNS40NDkyMTg3LDI1Ny4yNDIxOTggMy4zOTg0Mzc1LDEwOC40MTAxNTUgQzE2LjMwNzA2NjEsNDEuODExNDE3NCA4NC43Mjc1ODI5LC0xMS45OTIyOTg1IDE3MS41MDc4MTMsMy4yNTAwMDAzOCBaIiBpZD0iUGF0aC0xIiBmaWxsPSIjMDAwMDAwIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj48L3BhdGg+CiAgICA8L2c+Cjwvc3ZnPg==);
        }
        /* sitNSpin.less */
        @keyframes rotateBefore {
        from {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(0deg);
        }

        to {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(-360deg);
        }
        }

        @keyframes rotateAfter {
        from {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(0deg);
        }

        to {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(360deg);
        }
        }
            .spinner-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999; 
                display: none; 
            }


            .spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);


            
            }


        </style>

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
