<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/reset.css">
    <title>Restablecer Contraseña</title>
</head>
<body>
    

    <div class='login-box'>
       
       <?php
       $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
       if (!$conexion) {
           die("Error de conexión: " . mysqli_connect_error());
       }
   
       if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
           $token = $_GET['token'];
   
           $consultaToken = "SELECT * FROM usuarios WHERE token_recuperacion = '$token' AND TIMESTAMPDIFF(HOUR, fecha_token, NOW()) < 24";
           $resultadoToken = mysqli_query($conexion, $consultaToken);

            if ($resultadoToken && mysqli_num_rows($resultadoToken) == 1) {
                ?>

                <form class='login-box' action='process_reset_password.php' method='post'>
                <h2>Restablecer Contraseña</h2> 
                <div class='user-box'>
                <input type='password' name='password' required>
                <label for='password'>Nueva Contraseña:</label>
                </div>

                <div class='user-box'>
                <input type='password' name='password_repeated' required>
                <label for='password_repeated'>Repetir Nueva Contraseña:</label>
                </div>

                <?php echo "<input type='hidden' name='token' value='$token'>"; ?>
                <button class='btn4'><input type='submit'onclick='submitForm()' style='display: none;', style="position: relative;">Restablecer Contraseña</button> 
                </form>

                <?php
            } else {
                echo "<p class='error-message'>El enlace de restablecimiento de contraseña no es válido o ha expirado. Por favor, solicita un nuevo enlace de recuperación.</p>";
            }
       }
       
       mysqli_close($conexion);
       ?>
    </div>
</body>
</html>
