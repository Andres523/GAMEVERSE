<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/recuper.css">
    <title>Recuperación de Cuenta</title>
</head>
<body>

  <!-- Animacion -->
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
		<defs>
			<linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(204, 102, 0, 0.06)"></stop>
                <stop offset="50%" style="stop-color:rgba(204, 102, 0, 0.6)"></stop>
                <stop offset="100%" style="stop-color:rgba(204, 102, 0, 0.2)"></stop>
			</linearGradient>
			<path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
		</defs>
		<g>
			<use xlink:href='#wave' opacity=".3">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="10s"
          calcMode="spline"
          values="270 230; -334 180; 270 230"
          keyTimes="0; .5; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacity=".6">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="8s"
          calcMode="spline"
          values="-270 230;243 220;-270 230"
          keyTimes="0; .6; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacty=".9">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="6s"
          calcMode="spline"
          values="0 230;-140 200;0 230"
          keyTimes="0; .4; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
		</g>
	</svg>

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
<style>
    /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
    @media only screen and (max-width: 1200px) {
            body {
                width: 100%; 
                margin: 5px; 
                text-align: center;
            }
        }

</style>