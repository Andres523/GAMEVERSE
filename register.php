<!DOCTYPE html>
<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>register</title>
</head>
<body>
<div class="spinner-overlay">
    <div class="spinner">
     


        <style>

        .spinner:before {
          transform: rotateX(60deg) rotateY(45deg) rotateZ(45deg);
          animation: 750ms rotateBefore infinite linear reverse;
        }

        .spinner:after {
          transform: rotateX(240deg) rotateY(45deg) rotateZ(45deg);
          animation: 750ms rotateAfter infinite linear;
        }

        .spinner:before,
        .spinner:after {
          box-sizing: border-box;
          content: '';
          display: block;
          position: absolute;
          margin-top: -5em;
          margin-left: -5em;
          width: 10em;
          height: 10em;
          transform-style: preserve-3d;
          transform-origin: 50%;
          transform: rotateY(50%);
          perspective-origin: 50% 50%;
          perspective: 300px;
          background-size: 10em 10em;
          background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjI2NnB4IiBoZWlnaHQ9IjI5N3B4IiB2aWV3Qm94PSIwIDAgMjY2IDI5NyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CiAgICA8dGl0bGU+c3Bpbm5lcjwvdGl0bGU+CiAgICA8ZGVzY3JpcHRpb24+Q3JlYXRlZCB3aXRoIFNrZXRjaCAoaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoKTwvZGVzY3JpcHRpb24+CiAgICA8ZGVmcz48L2RlZnM+CiAgICA8ZyBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBza2V0Y2g6dHlwZT0iTVNQYWdlIj4KICAgICAgICA8cGF0aCBkPSJNMTcxLjUwNzgxMywzLjI1MDAwMDM4IEMyMjYuMjA4MTgzLDEyLjg1NzcxMTEgMjk3LjExMjcyMiw3MS40OTEyODIzIDI1MC44OTU1OTksMTA4LjQxMDE1NSBDMjE2LjU4MjAyNCwxMzUuODIwMzEgMTg2LjUyODQwNSw5Ny4wNjI0OTY0IDE1Ni44MDA3NzQsODUuNzczNDM0NiBDMTI3LjA3MzE0Myw3NC40ODQzNzIxIDc2Ljg4ODQ2MzIsODQuMjE2MTQ2MiA2MC4xMjg5MDY1LDEwOC40MTAxNTMgQy0xNS45ODA0Njg1LDIxOC4yODEyNDcgMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IDE0NS4yNzczNDQsMjk2LjY2Nzk2OCBDMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IC0yNS40NDkyMTg3LDI1Ny4yNDIxOTggMy4zOTg0Mzc1LDEwOC40MTAxNTUgQzE2LjMwNzA2NjEsNDEuODExNDE3NCA4NC43Mjc1ODI5LC0xMS45OTIyOTg1IDE3MS41MDc4MTMsMy4yNTAwMDAzOCBaIiBpZD0iUGF0aC0xIiBmaWxsPSIjMDAwMDAwIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj48L3BhdGg+CiAgICA8L2c+Cjwvc3ZnPg==);
        }
        /* sitNSpin.less */
        @keyframes rotateBefore {
          from {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(0deg);
          }

          to {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(-360deg);
          }
        }

        @keyframes rotateAfter {
          from {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(0deg);
          }

          to {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(360deg);
          }
        }
            .spinner-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999; 
                display: none; 
            }


            .spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
 

            
            }


        </style>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.spinner-overlay').style.display = 'block';
    });

    window.addEventListener('load', function() {
        document.querySelector('.spinner-overlay').style.display = 'none';
    });

   
    window.addEventListener('beforeunload', function(event) {
        
        document.querySelector('.spinner-overlay').style.display = 'none';
    });
        </script>

    </div>
</div>
    <div class="login-box">
        <h2>Registro</h2>
        <form action="./register.php" method="post">
            <div class="user-box">
                <input type="text" name="nombre" required="">
                <label>nombre de usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="password" required="">
            <label>contraseña</label>
            </div>
            <div class="user-box">
                <input type="password" name="password_repetida" id="password_repetida" required="">
                <label>repetir contraseña</label>
            </div>
            <button type="button" onclick="toggleMostrarContrasenas()">Mostrar/ocultar contraseñas</button>

            
            <div class="user-box">
                <input type="email" name="correo" required="">
                <label for="">correo</label>
            </div>
            
            <center><button class="btn4" type="submit" value="registrarse">Enviar</button></center>
            <br>
            <style>
                .btn4 {
                    --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
                    --border-width: .125em;
                    --curve-size: .5em;
                    --blur: 30px;
                    --bg: #080312;
                    --color: #afffff;
                    color: var(--color);
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
                        0% var(--curve-size),
                        var(--curve-size) 0,
                        100% 0,
                        100% calc(100% - var(--curve-size)),
                        calc(100% - var(--curve-size)) 100%,
                        0 100%
                    );
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
                        var(--border-width)
                        calc(var(--curve-size) + var(--border-width) * .5),
                        calc(var(--curve-size) + var(--border-width) * .5) var(--border-width),
                        calc(100% - var(--border-width))
                        var(--border-width),
                        calc(100% - var(--border-width))
                        calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
                        calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) calc(100% - var(--border-width)),
                        var(--border-width) calc(100% - var(--border-width)));
                    transition: clip-path 500ms;
                }
                .btn4:where(:hover, :focus)::after {
                    clip-path: polygon(
                        calc(100% - var(--border-width))
                        calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
                        calc(100% - var(--border-width))
                        var(--border-width),
                        calc(100% - var(--border-width))
                        calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
                        calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5))
                        calc(100% - var(--border-width)));
                    transition: 200ms;
                }
                .btn4:where(:hover, :focus) {
                    color: #fff;
                }
            </style>
            <br>
            <br>

            
            <?php
            $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombreUsuario = $_POST['nombre'];
                $nombreUsuarioSinEspacios = trim($nombreUsuario);
            
                
                if (empty($nombreUsuarioSinEspacios)) {
                    echo "<p style='color: red;'>El nombre de usuario no puede consistir solo en espacios en blanco.</p>";
                    mysqli_close($conexion);
                    exit;
                }
            }


            $nombreUsuario = $_POST['nombre'];
            $password = $_POST['password'];
            $passwordRepetida = $_POST['password_repetida'];
            $correo = $_POST['correo'];


            if (ctype_space($password)) {
                echo "<p style='color: red;'>La contraseña no puede consistir solo en espacios en blanco.</p>";
                mysqli_close($conexion);
                exit;
            }

            if ($password != $passwordRepetida) {
                echo "<p style='color: red;'>Las contraseñas no coinciden. Intenta de nuevo.</p>";
                mysqli_close($conexion);
                exit;
            }
            $consultaUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombreUsuario'";
            $resultadoUsuario = mysqli_query($conexion, $consultaUsuario);
            if (mysqli_num_rows($resultadoUsuario) > 0) {
                echo "<p style='color: red;'>El nombre de usuario ya está registrado. Por favor, elige otro nombre.</p>";
                mysqli_close($conexion);
                exit;
            }
            $consultaCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
            $resultadoCorreo = mysqli_query($conexion, $consultaCorreo);
            if (mysqli_num_rows($resultadoCorreo) > 0) {
                echo "<p style='color: red;'>El correo ya está registrado. Por favor, utiliza otro correo.</p>";
                mysqli_close($conexion);
                exit;
            }

            $token = bin2hex(random_bytes(32));
            $sql = "INSERT INTO usuarios (nombre, password, correo, token_verificacion, Rol) VALUES ('$nombreUsuario', '$password', '$correo', '$token', 'Usuario')";
            error_reporting(E_ERROR | E_PARSE);
            if (mysqli_query($conexion, $sql)) {
                $to = $correo;
                $subject = 'Verificación de registro en Tu Sitio Web';
                $message = 'buenas bienvenido a Gameverse  Por favor, haga clic en el siguiente enlace para verificar su registro: ' . 'http://localhost/GAMEVERSE/verificacion.php?token=' . $token;
                $headers = 'From: tu_correo@gmail.com' . "\r\n" .
                           'Reply-To: tu_correo@gmail.com' . "\r\n" .
                           'X-Mailer: PHP/' . phpversion();
                if (mail($to, $subject, $message, $headers)) {
                    echo "<p style='color: green;'>Registro exitoso. Un correo de verificación ha sido enviado a su dirección de correo.</p>";
                    header("Location: GAMEVERSE.php");
                    exit;
                } else {
                    echo "<p style='color: red;'>Error al enviar el correo de verificación.</p>";
                    header("Location: ./register.html");
                    exit;
                }


            } else {
                echo "<p style='color: red;'>Error al registrar el usuario: </p>" . mysqli_error($conexion);
                header("Location: ./register.html");
                exit;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombreUsuario = $_POST['nombre'];
                $nombreUsuarioSinEspacios = trim($nombreUsuario);
            
                if (empty($nombreUsuarioSinEspacios)) {
                    echo "<p style='color: red;'>El nombre de usuario no puede consistir solo en espacios en blanco.</p>";
                    mysqli_close($conexion);
                    exit;
                }
            }


            


            mysqli_close($conexion);
            ?>
        </form>
    </div>
</body>
</html>
<script>
    function toggleMostrarContrasenas() {
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("password_repetida");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            confirmPasswordField.type = "text";
        } else {
            passwordField.type = "password";
            confirmPasswordField.type = "password";
        }
    }
</script>