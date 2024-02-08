<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $requisitos = $_POST['requisitos'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    
    $rutaImagen = guardarImagen();

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $consulta = "INSERT INTO productos (nombre, descripcion, requisitos, cantidad, precio, imagen) 
                 VALUES ('$nombre', '$descripcion', '$requisitos', $cantidad, $precio, '$rutaImagen')";

    if (mysqli_query($conexion, $consulta)) {
        echo "Producto guardado correctamente";
    } else {
        echo "Error al guardar producto: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

function guardarImagen() {
    $directorioImagenes = './img/juegos/';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
     
        echo 'Información del archivo:';
        echo '<pre>';
        print_r($_FILES['imagen']);
        echo '</pre>';
        header("Location: admin2.php"); 

        $nombreArchivo = time() . '_' . $_FILES['imagen']['name'];
        $rutaCompleta = $directorioImagenes . $nombreArchivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaCompleta)) {
            return $rutaCompleta;
        } else {
            echo "Error al mover el archivo de imagen";
        }
    } else {
        echo "No se recibió un archivo de imagen válido";
    }

    return '';
}

?>
