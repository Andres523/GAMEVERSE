<?php
session_start();

if (!isset($_SESSION['nombreUsuario'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombreUsuario = $_SESSION['nombreUsuario'];
    $selectedColor = $_POST['selectedColor'];
    $selectedImage = $_POST['selectedImage'];

    $actualizarFondo = "UPDATE usuarios SET color='$selectedColor', fondo='$selectedImage' WHERE nombre='$nombreUsuario'";

    if (mysqli_query($conexion, $actualizarFondo)) {
        mysqli_close($conexion);
        header("Location: perfil.php");
        exit();
    } else {
        echo "Error al actualizar el fondo: " . mysqli_error($conexion);
    }
} else {
    header("Location: index.php");
    exit();
}
?>

