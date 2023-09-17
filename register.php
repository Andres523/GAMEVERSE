<!DOCTYPE html>
<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
<?php
// Establece la conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

// Verifica si la conexión fue exitosa
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Recupera los datos del formulario
$nombreUsuario = $_POST['nombre'];
$password = $_POST['password'];
$passwordRepetida = $_POST['password_repetida'];
$correo = $_POST['correo'];

// Verifica que las contraseñas coincidan
if ($password != $passwordRepetida) {
    echo "Las contraseñas no coinciden. Intenta de nuevo.";
    mysqli_close($conexion);
    exit;
}

// Consulta SQL para insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, password, correo) VALUES ('$nombreUsuario', '$password', '$correo')";

// Ejecuta la consulta
if (mysqli_query($conexion, $sql)) {
    echo "Registro exitoso. Ahora puedes iniciar sesión.";
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conexion);
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
</body>
</html>