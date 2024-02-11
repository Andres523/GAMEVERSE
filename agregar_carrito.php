<?php
session_start();

if (isset($_SESSION['nombreUsuario'])) {
    // Realiza la conexión a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtén el ID del juego a agregar al carrito
    $id_juego = $_POST['id_juego'];

    // Obtén el ID del usuario
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $consulta_id_usuario = "SELECT id FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultado_id_usuario = mysqli_query($conexion, $consulta_id_usuario);
    $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
    $id_usuario = $fila_id_usuario['id'];

    // Verifica si el juego ya está en el carrito del usuario
    $consulta_verificar_carrito = "SELECT * FROM carrito WHERE id_usuario = $id_usuario AND id_producto = $id_juego";
    $resultado_verificar_carrito = mysqli_query($conexion, $consulta_verificar_carrito);

    if (mysqli_num_rows($resultado_verificar_carrito) > 0) {
        // Si el juego ya está en el carrito, puedes mostrar un mensaje al usuario
        echo 'Este juego ya está en tu carrito';
    } else {
        // Si el juego no está en el carrito, agrégalo
        $consulta_agregar_carrito = "INSERT INTO carrito (id_usuario, id_producto) VALUES ($id_usuario, $id_juego)";
        $resultado_agregar_carrito = mysqli_query($conexion, $consulta_agregar_carrito);
        if ($resultado_agregar_carrito) {
            // Redirige de vuelta a la página de detalles del producto
            header("Location: detalles_juego.php?id=$id_juego");
            exit();
        } else {
            echo "Error al agregar el juego al carrito: " . mysqli_error($conexion);
        }
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Debes iniciar sesión para agregar juegos a tu carrito.";
}
?>
