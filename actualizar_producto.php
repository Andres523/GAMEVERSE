<?php
// actualizar_producto.php

// Verifica si se han recibido los datos del formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión con la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    // Verifica si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Recupera los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $requisitos = $_POST['requisitos'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    // Prepara la consulta SQL para actualizar los datos del producto
    $consulta = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', requisitos='$requisitos', cantidad=$cantidad, precio=$precio WHERE id=$id";

    // Ejecuta la consulta y verifica si se realizó con éxito
    if (mysqli_query($conexion, $consulta)) {
        // Si la consulta se realizó con éxito, muestra un mensaje de éxito
        echo "Los datos del producto han sido actualizados correctamente";
    } else {
        // Si la consulta falla, muestra un mensaje de error
        echo "Error al actualizar los datos del producto: " . mysqli_error($conexion);
    }

    // Cierra la conexión con la base de datos
    mysqli_close($conexion);
}
?>
