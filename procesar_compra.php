<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    if(isset($_POST['confirmar'])) {
        $id_juego = $_POST['id_juego'];
        $nombre_juego = $_POST['nombre_juego'];
        // Otros datos del juego que necesites procesar
        $ubicacion = $_POST['ubicacion'];
        $direccion = $_POST['direccion'];

        // Conexión a la base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        // Verificar la conexión a la base de datos
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Insertar los datos de la compra en la tabla correspondiente
        $consulta_insertar_compra = "INSERT INTO compras (id_usuario, id_producto, fecha_compra, precio, cantidad) VALUES (?, ?, NOW(), ?, ?)";
        
        // Preparar la consulta de inserción
        $stmt_insertar_compra = mysqli_prepare($conexion, $consulta_insertar_compra);

        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt_insertar_compra === false) {
            die("Error en la preparación de la consulta: " . mysqli_error($conexion));
        }

        // Obtener el ID del usuario
        $consulta_id_usuario = "SELECT id, correo FROM usuarios WHERE nombre = ?";
        $stmt_id_usuario = mysqli_prepare($conexion, $consulta_id_usuario);
        mysqli_stmt_bind_param($stmt_id_usuario, "s", $nombreUsuario);
        mysqli_stmt_execute($stmt_id_usuario);
        $resultado_id_usuario = mysqli_stmt_get_result($stmt_id_usuario);
        $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
        $id_usuario = $fila_id_usuario['id'];
        $correo_usuario = $fila_id_usuario['correo'];

        // Obtener el precio del juego
        $consulta_precio_juego = "SELECT precio FROM productos WHERE id = ?";
        $stmt_precio_juego = mysqli_prepare($conexion, $consulta_precio_juego);
        mysqli_stmt_bind_param($stmt_precio_juego, "i", $id_juego);
        mysqli_stmt_execute($stmt_precio_juego);
        $resultado_precio_juego = mysqli_stmt_get_result($stmt_precio_juego);
        $fila_precio_juego = mysqli_fetch_assoc($resultado_precio_juego);
        $precio_juego = $fila_precio_juego['precio'];

        // Obtener la cantidad del formulario
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;

        // Ejecutar la inserción de la compra
        mysqli_stmt_bind_param($stmt_insertar_compra, "iiii", $id_usuario, $id_juego, $precio_juego, $cantidad);
        mysqli_stmt_execute($stmt_insertar_compra);

        // Verificar si la inserción fue exitosa
        if(mysqli_stmt_affected_rows($stmt_insertar_compra) > 0) {
            echo "La compra se ha realizado exitosamente.";
            echo "<br>";
            echo '<a href="tienda.php">Seguir explorando</a>';

            // Envío del correo electrónico de confirmación
            $asunto = "Confirmación de Compra en Gameverse";
            $mensaje = "Hola " . $nombreUsuario . ",\n\nTu compra del juego '" . $nombre_juego . "' ha sido procesada exitosamente.\n\nDetalles de la compra:\nID del juego: " . $id_juego . "\nPrecio: $" . $precio_juego . "\nCantidad: " . $cantidad . "\n\nGracias por comprar en Gameverse. Su envío llegará en máximo 3 días.";

            if (mail($correo_usuario, $asunto, $mensaje)) {
                echo "<br>Se ha enviado un correo electrónico de confirmación.";
            } else {
                echo "<br>Error: No se pudo enviar el correo electrónico de confirmación.";
            }
        } else {
            echo "Error al procesar la compra.";
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "No se ha enviado el formulario de confirmación de compra.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>
