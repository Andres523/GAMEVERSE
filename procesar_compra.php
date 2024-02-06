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

        // Obtener el ID del usuario y su correo electrónico
        $consulta_usuario = "SELECT id, correo FROM usuarios WHERE nombre = ?";
        $stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
        mysqli_stmt_bind_param($stmt_usuario, "s", $nombreUsuario);
        mysqli_stmt_execute($stmt_usuario);
        $resultado_usuario = mysqli_stmt_get_result($stmt_usuario);
        $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
        $id_usuario = $fila_usuario['id'];
        $correo_usuario = $fila_usuario['correo'];

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

            // Crear el mensaje del correo electrónico
            $to = $correo_usuario; // Correo del usuario
            $subject = "Confirmación de compra en GameVerse";
            $message = "Hola $nombreUsuario,\n\n";
            $message .= "¡Tu compra en GameVerse ha sido confirmada!\n\n";
            $message .= "Detalles de la compra:\n";
            $message .= "Juego: $nombre_juego\n";
            $message .= "Ubicación: $ubicacion\n";
            $message .= "Dirección de entrega: $direccion\n";
            $message .= "Precio: $precio_juego\n";
            $message .= "Cantidad: $cantidad\n\n";
            $message .= "Gracias por comprar en GameVerse. si el juego no te llega en 3 dias has un reporte";

            // Cabeceras del correo electrónico
            $headers = "From: sender@example.com\r\n";
            $headers .= "Reply-To: sender@example.com\r\n";
            $headers .= "Return-Path: sender@example.com\r\n"; 
            
            // Enviar el correo electrónico
            mail($to, $subject, $message, $headers);


            echo "<br>";
            echo "<a href='tienda.php'> Seguir explorando </a>";
            mysqli_close($conexion);
        } else {
            echo "No se ha enviado el formulario de confirmación de compra.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>
