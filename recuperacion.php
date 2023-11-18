<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/login.css">
    <title>Recuperación de Cuenta</title>
</head>
<body>
    <div class="login-box">
        <h2>Recuperación de Cuenta</h2>
        <br>
        <form action="" method="post">
            <div class="user-box">
                <input type="email" name="email" required="">
            <label for="email">Correo Electrónico:</label>
            </div>
        
            <center><button class="btn4" type="submit">Recuperar Cuenta</button></center>
        </form>
    

            <?php
            error_reporting(E_ALL);
                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST['email']; 
        
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                echo "<p style='color: red;'>Correo electrónico no válido. Intenta de nuevo.</p>";
            } else {
                $consultaUsuario = "SELECT * FROM usuarios WHERE correo = '$correo'";
                $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
            
                if ($resultadoUsuario === false) {
                    die("Error en la consulta: " . mysqli_error($conexion));
                }
            
                if (mysqli_num_rows($resultadoUsuario) == 1) {
                
                    $token = bin2hex(random_bytes(32));
                    $sql = "UPDATE usuarios SET token_recuperacion = '$token' WHERE correo = '$correo'";
                    
                    if (mysqli_query($conexion, $sql)) {
                    
                        $to = $correo;
                        $subject = 'Recuperación de Contraseña de gameverse';
                        $message = 'Haga clic en el siguiente enlace para restablecer su contraseña: ' . 'http://localhost/GAMEVERSE/reset_password.php?token=' . $token;
                        $headers = 'From: tu_correo@gmail.com' . "\r\n" .
                                   'Reply-To: tu_correo@gmail.com' . "\r\n" .
                                   'X-Mailer: PHP/' . phpversion();
                        
                        if (mail($to, $subject, $message, $headers)) {
                            echo "<p style='color: green;'>Hemos enviado un correo con las instrucciones para restablecer su contraseña.</p>";
                        } else {
                            echo "<p style='color: red;'>Error al enviar el correo de recuperación. Por favor, inténtalo más tarde.</p>";
                        }
                    } else {
                        echo "<p style='color: red;'>Error al actualizar el token de recuperación.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>El correo electrónico no está registrado en nuestro sistema. Verifica tu dirección de correo.</p>";
                }
            }
            }
        
            mysqli_close($conexion);
            ?>


        </form>
    </div>
</body>
</html>