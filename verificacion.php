<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación Exitosa</title>
</head>
<body>
    <h1>Tu cuenta ahora está verificada</h1>
    <p>Puedes <a href="login.php">iniciar sesión</a> con tu cuenta verificada.</p>
</body>
</html>



<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Verificar si el token existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE token_verificacion = '$token'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Actualiza el estado de verificación del usuario a 1 (verificado)
        $sql = "UPDATE usuarios SET verificado = 1 WHERE token_verificacion = '$token'";
        if (mysqli_query($conexion, $sql)) {
            echo "¡Tu cuenta ha sido verificada con éxito!";
        } else {
            echo "Error al verificar la cuenta. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Token de verificación no válido.";
    }

    mysqli_close($conexion);
}
?>

