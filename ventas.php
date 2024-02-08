<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener los datos de las compras de los usuarios
$consulta_ventas = "SELECT c.id_compra, c.id_usuario, u.nombre, u.correo, u.direccion, c.id_producto, p.nombre AS nombre_producto, c.precio, c.cantidad, c.precio * c.cantidad AS valor_total, c.repartidor_enviado
                    FROM compras c
                    INNER JOIN usuarios u ON c.id_usuario = u.id
                    INNER JOIN productos p ON c.id_producto = p.id
                    ORDER BY c.fecha_compra DESC"; // Ordenar por fecha de compra descendente

$resultado_ventas = mysqli_query($conexion, $consulta_ventas);

if (!$resultado_ventas) {
    die("Error al obtener datos de ventas: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Listado de Ventas</title>
    <!-- Agrega tus estilos CSS -->
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
    <h1>Listado de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID Compra</th>
            <th>ID Usuario</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Dirección</th>
            <th>ID Producto</th>
            <th>Nombre Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Valor Total</th>
            <th>Repartidor Enviado</th>
        </tr>
        <?php
        // Mostrar los datos de las ventas en la tabla
        while ($fila = mysqli_fetch_assoc($resultado_ventas)) {
            echo "<tr>";
            echo "<td>{$fila['id_compra']}</td>";
            echo "<td>{$fila['id_usuario']}</td>";
            echo "<td>{$fila['nombre']}</td>";
            echo "<td>{$fila['correo']}</td>";
            echo "<td>{$fila['direccion']}</td>";
            echo "<td>{$fila['id_producto']}</td>";
            echo "<td>{$fila['nombre_producto']}</td>";
            echo "<td>{$fila['precio']}</td>";
            echo "<td>{$fila['cantidad']}</td>";
            echo "<td>{$fila['valor_total']}</td>";
            echo "<td>";
            // Botón para indicar el estado del repartidor
            if ($fila['repartidor_enviado'] == 1) {
                echo '<button class="repartidor-btn" data-id-compra="' . $fila['id_compra'] . '" style="background-color: green;">Repartidor Enviado</button>';
            } else {
                echo '<button class="repartidor-btn" data-id-compra="' . $fila['id_compra'] . '" style="background-color: red;">Repartidor No Enviado</button>';
            }
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Agrega jQuery para facilitar el manejo de eventos -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Manejador de eventos para el clic en el botón del repartidor
        $('.repartidor-btn').click(function() {
            // Obtenemos el ID de la compra desde el atributo data
            var idCompra = $(this).data('id-compra');
            var estadoActual = $(this).text().trim(); // Estado actual del botón

            // Realizamos una solicitud AJAX para actualizar el estado del repartidor
            $.ajax({
                url: 'actualizar_estado_repartidor.php', // El archivo PHP que manejará la actualización
                method: 'POST',
                data: { idCompra: idCompra, estadoActual: estadoActual }, // Enviamos el ID de la compra y el estado actual al servidor
                success: function(response) {
                    // Cambiamos el color del botón y el texto según la respuesta del servidor
                    if (response == 'success') {
                        if (estadoActual == 'Repartidor Enviado') {
                            $('.repartidor-btn[data-id-compra="' + idCompra + '"]').css('background-color', 'red').text('Repartidor No Enviado');
                        } else {
                            $('.repartidor-btn[data-id-compra="' + idCompra + '"]').css('background-color', 'green').text('Repartidor Enviado');
                        }
                    } else {
                        alert('Error al actualizar el estado del repartidor');
                    }
                }
            });
        });
    </script>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
