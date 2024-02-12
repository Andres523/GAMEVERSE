<?php
$conexion = new mysqli("127.0.0.1", "root", "", "gameverse");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}


if ($resultado === false) {
    die("Error en la consulta SQL: " . $conexion->error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $descripcion = $conexion->real_escape_string($_POST["descripcion"]);

    $precio = $conexion->real_escape_string($_POST["precio"]);
    $cantidad = $conexion->real_escape_string($_POST["cantidad"]);


 

    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_temp = $_FILES["imagen"]["tmp_name"];
    $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);
    $imagen_nombre_nuevo = uniqid('imagen_') . "." . $imagen_extension;
    $ruta_imagen = "./img/juegos/" . $imagen_nombre_nuevo;

   
    if (move_uploaded_file($imagen_temp, $ruta_imagen)) {
        $insertarConsulta = "INSERT INTO marketplace (nombre, descripcion, precio, imagen, cantidad)
                            VALUES ('$nombre', '$descripcion', '$precio', '$ruta_imagen', '$cantidad')";

        if ($conexion->query($insertarConsulta)) {
            header('Location: mark.php');
        } else {
            echo "Error al agregar el producto: " . $conexion->error;
        }
    } else {
        echo "Error al subir la imagen";
    }
}
?>
