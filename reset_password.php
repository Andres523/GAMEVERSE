<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h2>Restablecer Contraseña</h2>
    
    <?php
    $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
        $token = $_GET['token'];

        $consultaToken = "SELECT * FROM usuarios WHERE token_recuperacion = '$token' AND TIMESTAMPDIFF(HOUR, fecha_token, NOW()) < 24";
        $resultadoToken = mysqli_query($conexion, $consultaToken);
    
        if ($resultadoToken && mysqli_num_rows($resultadoToken) == 1) {
            echo "<form action='process_reset_password.php' method='post'>";
            echo "<label for='password'>Nueva Contraseña:</label>";
            echo "<input type='password' name='password' required><br><br>";
            echo "<label for='password_repeated'>Repetir Nueva Contraseña:</label>";
            echo "<input type='password' name='password_repeated' required><br><br>";
            echo "<input type='hidden' name='token' value='$token'>";
            echo "<input type='submit' value='Restablecer Contraseña'>";
            echo "</form>";
        } else {
            echo "<p style='color: red;'>El enlace de restablecimiento de contraseña no es válido o ha expirado. Por favor, solicita un nuevo enlace de recuperación.</p>";
        }
    }
    
    mysqli_close($conexion);
    ?>
</body>
</html>
