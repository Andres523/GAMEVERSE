<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
 
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />  
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
<style>
    #contador {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        display: inline-block;
        margin-left: 5px;
    }
</style>
    
</head>
<body>
    <div class="box"></div>
<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    if(isset($_POST['comprar'])) {
        // Conexión a la base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        // Verificar la conexión a la base de datos
        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }


     
        // Obtener ubicación y dirección del usuario
        $ubicacion = $_POST['ubicacion'];
        $direccion = $_POST['direccion'];





            if(isset($_POST['id_juego']) && isset($_POST['nombre_juego']) && isset($_POST['cantidad'])) {
                // Obtener los datos de los juegos del carrito
                $ids_juegos = $_POST['id_juego'];
                $nombres_juegos = $_POST['nombre_juego'];
                $cantidades = $_POST['cantidad'];


                foreach($ids_juegos as $key => $id_juego) {
                    $nombre_juego = $nombres_juegos[$key];
                    $cantidad = $cantidades[$key];
                    $cantidadj = $_POST['cantidad'][$key]; // Obtener la cantidad seleccionada por el usuario
    
                    // Calcular la cantidad a restar
                    $cantidad_restar = $cantidad - $cantidadj;
    
                    // Actualizar la cantidad disponible del juego en la base de datos
                    $consulta_actualizar_cantidad = "UPDATE productos SET cantidad = cantidad - ? WHERE id = ?";
                    $stmt_actualizar_cantidad = mysqli_prepare($conexion, $consulta_actualizar_cantidad);
                    mysqli_stmt_bind_param($stmt_actualizar_cantidad, "ii", $cantidadj, $id_juego);
                    mysqli_stmt_execute($stmt_actualizar_cantidad);

                    $consulta_precio_juego = "SELECT precio FROM productos WHERE id = ?";
                    $stmt_precio_juego = mysqli_prepare($conexion, $consulta_precio_juego);
                    mysqli_stmt_bind_param($stmt_precio_juego, "i", $id_juego);
                    mysqli_stmt_execute($stmt_precio_juego);
                    $resultado_precio_juego = mysqli_stmt_get_result($stmt_precio_juego);
                    $fila_precio_juego = mysqli_fetch_assoc($resultado_precio_juego);
                    $precio_juego = $fila_precio_juego['precio'];
    


  

                    $consulta_usuario = "SELECT id, correo FROM usuarios WHERE nombre = ?";
                    $stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
                    mysqli_stmt_bind_param($stmt_usuario, "s", $nombreUsuario);
                    mysqli_stmt_execute($stmt_usuario);
                    $resultado_usuario = mysqli_stmt_get_result($stmt_usuario);
                    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
                    $id_usuario = $fila_usuario['id'];
                    $correo_usuario = $fila_usuario['correo'];









                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Tu código de conexión a la base de datos y configuración de variables
                    
                        // Recuperar el ID del usuario
                        $consulta_usuario = "SELECT id FROM usuarios WHERE nombre = ?";
                        $stmt_usuario = mysqli_prepare($conexion, $consulta_usuario);
                        mysqli_stmt_bind_param($stmt_usuario, "s", $nombreUsuario);
                        mysqli_stmt_execute($stmt_usuario);
                        $resultado_usuario = mysqli_stmt_get_result($stmt_usuario);
                        $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
                        $id_usuario = $fila_usuario['id'];
                    
                        // Recopilar precios de los productos
                        $precios = array();
                        foreach ($ids_juegos as $id_juego) {
                            $consulta_precio = "SELECT precio FROM productos WHERE id = ?";
                            $stmt_precio = mysqli_prepare($conexion, $consulta_precio);
                            mysqli_stmt_bind_param($stmt_precio, "i", $id_juego);
                            mysqli_stmt_execute($stmt_precio);
                            $resultado_precio = mysqli_stmt_get_result($stmt_precio);
                            $fila_precio = mysqli_fetch_assoc($resultado_precio);
                            $precios[] = $fila_precio['precio'];
                        }
                    
                        // Iterar sobre los juegos comprados
                        for ($i = 0; $i < count($ids_juegos); $i++) {
                            $id_juego = $ids_juegos[$i];
                            $cantidad = $cantidades[$i];
                            $precio = $precios[$i];
                    
                            // Verificar si el producto ya existe en la tabla de compras para este usuario
                            $consulta_existencia_compra = "SELECT id_compra, cantidad FROM compras WHERE id_usuario = ? AND id_producto = ?";
                            $stmt_existencia_compra = mysqli_prepare($conexion, $consulta_existencia_compra);
                            mysqli_stmt_bind_param($stmt_existencia_compra, "ii", $id_usuario, $id_juego);
                            mysqli_stmt_execute($stmt_existencia_compra);
                            $resultado_existencia_compra = mysqli_stmt_get_result($stmt_existencia_compra);
                    
                            if (mysqli_num_rows($resultado_existencia_compra) > 0) {
                                // El producto ya existe, actualizar la cantidad
                                $fila_existencia_compra = mysqli_fetch_assoc($resultado_existencia_compra);
                                $id_compra_existente = $fila_existencia_compra['id_compra'];
                                $cantidad_existente = $fila_existencia_compra['cantidad'];
                                $nueva_cantidad = $cantidad_existente + $cantidad;
                    
                                // Actualizar la cantidad en la tabla de compras
                                $consulta_actualizar_compra = "UPDATE compras SET cantidad = ? WHERE id_compra = ?";
                                $stmt_actualizar_compra = mysqli_prepare($conexion, $consulta_actualizar_compra);
                                mysqli_stmt_bind_param($stmt_actualizar_compra, "ii", $nueva_cantidad, $id_compra_existente);
                                mysqli_stmt_execute($stmt_actualizar_compra);
                            } else {
                                // Insertar un nuevo registro de compra
                                $consulta_insertar_compra = "INSERT INTO compras (id_usuario, id_producto, fecha_compra, cantidad, precio) VALUES (?, ?, NOW(), ?, ?)";
                                $stmt_insertar_compra = mysqli_prepare($conexion, $consulta_insertar_compra);
                                mysqli_stmt_bind_param($stmt_insertar_compra, "iiid", $id_usuario, $id_juego, $cantidad, $precio);
                                mysqli_stmt_execute($stmt_insertar_compra);
                            }
                        }
                    }


                // Enviar correo electrónico de confirmación al usuario
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
                $message .= "Gracias por comprar en GameVerse. Si el juego no te llega en 3 días, haz un reporte.";

                // Cabeceras del correo electrónico
                $headers = "From: sender@example.com\r\n";
                $headers .= "Reply-To: sender@example.com\r\n";
                $headers .= "Return-Path: sender@example.com\r\n"; 
                
                // Enviar el correo electrónico
                mail($to, $subject, $message, $headers);
            }
?>
            <center><lottie-player src="https://lottie.host/80de2692-661a-4920-9946-f0b1f491864a/aT43SHn92I.json" background="#fff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player></center>
            <?php
            echo "<center>";
            echo "La compra se ha realizado exitosamente.";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "Serás redirigido a la tienda en: <span id='contador'>3</span> segundos ";
            echo "<script>
            var segundos = 3;
            setInterval(function() {
                segundos--;
                document.getElementById('contador').innerText = segundos;
                if(segundos == 0) {
                    window.location.href = 'tienda.php';
                }
            }, 1000);
            </script>";
            echo "</center>";


            // Cerrar la conexión a la base de datos al final del procesamiento
            mysqli_close($conexion);

            // Redirigir al usuario a la página de la tienda u otra página deseada
            
            exit();
        } else {
            echo "No se recibieron los datos del carrito.";
        }
    } else {
        header("Location: index.php");
        exit();
    }
}
?>


<style>

@media only screen and (max-width: 1200px) {
.i{
    width: 100%; 
    margin: 5px; 
    text-align: center;
}
}

.box {
    margin: 0;
    padding: 0;
    box-shadow: -30px 30px 30px rgba(3, 244, 31, 0.5); /* Cambié el signo para invertir la dirección */
    width: 100px; /* Establece un ancho apropiado para tu elemento */
    height: 100px; /* Establece una altura apropiada para tu elemento */
    background-color: transparent;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
}


body {
    margin: 0;
    padding: 0;
    box-shadow: 30px 30px 30px rgba(136, 3, 244, 0.5);
    width: 800px;
    height: 800px;
    background-color: transparent;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;

}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    top: 50%;
    left: 50%;
}

.lottie-container {
    width: 400px;
    height: 400px;
}
.lottie-player {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    height: 100%;
}
</style>

</body>
</html>