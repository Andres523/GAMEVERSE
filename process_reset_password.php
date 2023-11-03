<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proseso</title>
</head>
<body>
    
</body>
</html>
<?php
$conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $password_repeated = $_POST['password_repeated'];

    if ($password != $password_repeated) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
    } else {
        $sql = "UPDATE usuarios SET password = '$password', token_recuperacion = NULL WHERE token_recuperacion = '$token'";
        if (mysqli_query($conexion, $sql)) {
            // Contraseña actualizada con éxito, redirigir al usuario a login.php
            header("Location: login.php");
            exit;
        } else {
            echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
        }
    }
}

mysqli_close($conexion);
?>
