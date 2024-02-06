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
    <title>Listado de Ventas</title>
    <!-- Agrega tus estilos CSS -->
</head>
<body>
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
