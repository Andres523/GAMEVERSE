<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conexion</title>
</head>
<body>
<?php


// Verificar si se recibieron datos del formulario
if (isset($_POST['nombre']) && isset($_POST['password'])) {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Establecer la conexión a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta SQL para verificar las credenciales (ajusta según tu estructura de base de datos)
    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre' AND password='$password'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Las credenciales son válidas, redirigir al usuario a la página de inicio
        header("Location: GAMEVERSE.html");
        exit; 
    } else {
        // Las credenciales son inválidas, mostrar un mensaje de error
        echo "Credenciales incorrectas. Intenta de nuevo.$nombre";
    }
    mysqli_close($conexion);
}



?>

</body>
</html>
