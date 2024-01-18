<?php
$conexion = new mysqli("127.0.0.1", "root", "", "gameverse");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$resultado = $conexion->query("SELECT id, nombre FROM categorias");

if ($resultado === false) {
    die("Error en la consulta SQL: " . $conexion->error);
}

if ($resultado->num_rows > 0) {
    $categorias = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    $categorias = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $descripcion = $conexion->real_escape_string($_POST["descripcion"]);
    $requisitos = $conexion->real_escape_string($_POST["requisitos"]);
    $precio = $conexion->real_escape_string($_POST["precio"]);
    $video_youtube = $conexion->real_escape_string($_POST["video_youtube"]);
    $cantidad = $conexion->real_escape_string($_POST["cantidad"]);
    $categoriasSeleccionadas = isset($_POST['categorias']) ? $_POST['categorias'] : [];

    $categoriasParaGuardar = implode(',', $categoriasSeleccionadas);

    $imagen_nombre = $_FILES["imagen"]["name"];
    $imagen_temp = $_FILES["imagen"]["tmp_name"];
    $imagen_extension = pathinfo($imagen_nombre, PATHINFO_EXTENSION);
    $imagen_nombre_nuevo = uniqid('imagen_') . "." . $imagen_extension;
    $ruta_imagen = "./img/juegos/" . $imagen_nombre_nuevo;


if (move_uploaded_file($imagen_temp, $ruta_imagen)) {
    $insertarConsulta = "INSERT INTO productos (nombre, descripcion, requisitos, precio, imagen, cantidad, video_youtube, categoria)
                        VALUES ('$nombre', '$descripcion', '$requisitos', '$precio', '$ruta_imagen', '$cantidad', '$video_youtube', '" . implode(',', $categoriasSeleccionadas) . "')";

    if ($conexion->query($insertarConsulta)) {
        header('Location: admin.php');
        
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }
} else {
    echo "Error al subir la imagen.";
}


}
