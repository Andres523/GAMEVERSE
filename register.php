<!DOCTYPE html>
<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>register</title>
</head>
<body>
    <div class="login-box">
        <h2>register</h2>
        <form action="./register.php" method="post">
            <div class="user-box">
                <input type="text" name="nombre" required="">
                <label>nombre de usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required="">
                <label>contraseña</label>
            </div>
            <div class="user-box">
                <input type="password" name="password_repetida" required="">
                <label>repetir contraseña</label>
            </div>
            <div class="user-box">
                <input type="email" name="correo" required="">
                <label for="">correo</label>
            </div>
            <center><a href="./index.php">iniciar sesion</a></center>
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
            $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }
            $nombreUsuario = $_POST['nombre'];
            $password = $_POST['password'];
            $passwordRepetida = $_POST['password_repetida'];
            $correo = $_POST['correo'];
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
            $sql = "INSERT INTO usuarios (nombre, password, correo, token_verificacion) VALUES ('$nombreUsuario', '$password', '$correo', '$token')";
            error_reporting(E_ERROR | E_PARSE);
            if (mysqli_query($conexion, $sql)) {
                $to = $correo;
                $subject = 'Verificación de registro en Tu Sitio Web';
                $message = 'buenas bienvenido a Gameverse <br> Por favor, haga clic en el siguiente enlace para verificar su registro: ' . 'http://localhost/GAMEVERSE/login.php?token=' . $token;
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
            mysqli_close($conexion);
            ?>
        </form>
    </div>
</body>
</html>
