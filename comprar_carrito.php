<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    if(isset($_POST['comprar'])) {
        // Aquí obtienes las variables específicas del formulario de compra desde el carrito
        $id_juego = $_POST['id_juego'];
        $nombre_juego = $_POST['nombre_juego'];
        $ubicacion = $_POST['ubicacion'];
        $direccion = $_POST['direccion'];
        // Otros datos específicos del juego que necesites procesar

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

        // Obtener la cantidad disponible del producto
        $consulta_cantidad_producto = "SELECT cantidad FROM productos WHERE id = ?";
        $stmt_cantidad_producto = mysqli_prepare($conexion, $consulta_cantidad_producto);
        mysqli_stmt_bind_param($stmt_cantidad_producto, "i", $id_juego);
        mysqli_stmt_execute($stmt_cantidad_producto);
        $resultado_cantidad_producto = mysqli_stmt_get_result($stmt_cantidad_producto);
        $fila_cantidad_producto = mysqli_fetch_assoc($resultado_cantidad_producto);
        $cantidad_disponible = $fila_cantidad_producto['cantidad'];

        // Obtener la cantidad del formulario
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;

        // Verificar si la cantidad es válida y está disponible
        if ($cantidad > 0 && $cantidad <= $cantidad_disponible) {
            // Ejecutar la inserción de la compra
            mysqli_stmt_bind_param($stmt_insertar_compra, "iiii", $id_usuario, $id_juego, $precio_juego, $cantidad);
            mysqli_stmt_execute($stmt_insertar_compra);

            // Verificar si la inserción fue exitosa
            if(mysqli_stmt_affected_rows($stmt_insertar_compra) > 0) {
                // Aquí podrías realizar otras operaciones, como enviar correos electrónicos, etc.
                echo "La compra se ha realizado exitosamente.";
                echo "<br>";
                // Redirección después de un cierto tiempo
                header("refresh:7;url=tienda.php");
                echo "Serás redirigido a la tienda en: <span id='contador'>7</span> segundos ";
                echo "<script>
                    var segundos = 7;
                    setInterval(function() {
                        segundos--;
                        document.getElementById('contador').innerText = segundos;
                        if(segundos == 0) {
                            window.location.href = 'tienda.php';
                        }
                    }, 1000);
                    </script>";
            } else {
                echo "No se ha enviado el formulario de confirmación de compra.";
            }
        } else {
            // Si la cantidad es negativa o excede la cantidad disponible, cancelar la compra
            echo "La cantidad seleccionada no es válida. Por favor, seleccione una cantidad válida.";
        }
        
        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        header("Location: index.php");
        exit();
    }
}
?>
<!-- Aquí puedes agregar tu formulario HTML para la compra desde el carrito -->
