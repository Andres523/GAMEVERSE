<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>Login</title>
</head>
<body>
  
  
  <!-- Animacion -->
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
		<defs>
			<linearGradient id="bg">
        <stop offset="0%" style="stop-color:rgba(0, 0, 100, 0.06)"></stop>
        <stop offset="50%" style="stop-color:rgba(0, 0, 100, 0.6)"></stop>
        <stop offset="100%" style="stop-color:rgba(0, 0, 100, 0.2)"></stop>
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
        <h2>Login</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type="text" name="nombre" required="">
                <label>Nombre de usuario</label>
            </div>
            <div class="user-box">
              <input type="password" name="password" id="passwordField" required autocomplete="current-password" >
              <label for="passwordField">Contraseña</label>
              <span class="toggle-password" onclick="togglePassword()">Mostrar</span>
            </div>
            <a href="./Recuperacion.php" style="font-size: 9px;letter-spacing: 1px;padding: 0px 0px;">¿olvidaste la Contraseña ?</a>
            <br>
            <br>
            <center><button class="btn4" type="submit">Enviar</button></center>

            <center><a href="./register.html" style="letter-spacing: 4px;padding: 10px 20px;">¿No tienes cuenta?</a></center>

        </form>

        

        <?php
        if (isset($_POST['nombre']) && isset($_POST['password'])) {
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];
            $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");


            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM usuarios WHERE nombre='$nombre'";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado && mysqli_num_rows($resultado) == 1) {
                $fila = mysqli_fetch_assoc($resultado);
                if ($fila['password'] == $password) {
                    if ($fila['verificado'] == 1   ) {
                        $_SESSION['nombreUsuario'] = $nombre;
                        header("Location: index.php");
                        exit;
                    } else if ($fila['verificado'] == 0  ) {
             
                        echo "<p class='mensaje-error'>Tu cuenta no ha sido verificada. Verifica tu correo antes de iniciar sesión.</p>";
                    } else {
                 
                        echo "<p class='mensaje-error'>Usuario no verificado o token inválido.</p>";
                    }
                } else {
                    echo "<p class='mensaje-error'>Contraseña incorrecta. Intenta de nuevo.</p>";
                }
            } else {
                echo "<p class='mensaje-error'>Nombre de usuario incorrecto. Intenta de nuevo.</p>";
            }

            mysqli_close($conexion);
        }
        ?>

    </div>


    
</body>
</html>




<style>
  .mensaje-error {
      color: red; 
  }
</style>

<style>
      .btn4 {
  --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
  --border-width: .125em;
  --curve-size: .5em;
  --blur: 30px;
  --bg: #080312;
  --color: #afffff;
  color: var(--color);
    /* use position: relative; so that BG is only for .btn */
  position: relative;
  isolation: isolate;
  display: inline-grid;
  place-content: center;
  padding: .5em 1.5em;
  font-size: 17px;
  border: 0;
  text-transform: uppercase;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, .6);
  clip-path: polygon(
            /* Top-left */
            0% var(--curve-size),

            var(--curve-size) 0,
            /* top-right */
            100% 0,
            100% calc(100% - var(--curve-size)),

            /* bottom-right 1 */
            calc(100% - var(--curve-size)) 100%,
            /* bottom-right 2 */
            0 100%);
  transition: color 250ms;
}

.btn4::after,
.btn4::before {
  content: '';
  position: absolute;
  inset: 0;
}

.btn4::before {
  background: var(--border-color);
  background-size: 300% 300%;
  animation: move-bg7234 5s ease infinite;
  z-index: -2;
}

@keyframes move-bg7234 {
  0% {
    background-position: 31% 0%
  }

  50% {
    background-position: 70% 100%
  }

  100% {
    background-position: 31% 0%
  }
}

.btn4::after {
  background: var(--bg);
  z-index: -1;
  clip-path: polygon(
            /* Top-left */
            var(--border-width) 
            calc(var(--curve-size) + var(--border-width) * .5),

            calc(var(--curve-size) + var(--border-width) * .5) var(--border-width),

            /* top-right */
            calc(100% - var(--border-width)) 
            var(--border-width),

            calc(100% - var(--border-width)) 
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),

            /* bottom-right 1 */
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) calc(100% - var(--border-width)),
            /* bottom-right 2 */
            var(--border-width) calc(100% - var(--border-width)));
  transition: clip-path 500ms;
}

.btn4:where(:hover, :focus)::after {
  clip-path: polygon(
                /* Top-left */
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
    
                calc(100% - var(--border-width))

                var(--border-width),
    
                /* top-right */
                calc(100% - var(--border-width))

                 var(--border-width),
    
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
    
                /* bottom-right 1 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) 
                calc(100% - var(--border-width)),

                /* bottom-right 2 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5))
                calc(100% - var(--border-width)));
  transition: 200ms;
}

.btn4:where(:hover, :focus) {
  color: #fff;
}
    </style>

<style>
    /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
    @media only screen and (max-width: 1200px) {
            body {
                width: 100%; 
                margin: 5px; 
                text-align: center;
            }
        }

        
  .toggle-password {
  cursor: pointer;
  color: blue;
}

</style>

<script>
        function togglePassword() {
            var passwordField = document.getElementById("passwordField");
            
          
            if (passwordField.type === "password") {
                passwordField.type = "text";
                document.querySelector(".toggle-password").textContent = "Ocultar";
            } else {
                passwordField.type = "password";
                document.querySelector(".toggle-password").textContent = "Mostrar";
            }
        }
    </script>