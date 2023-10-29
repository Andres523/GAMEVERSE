<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>login</title>
    <a href="./GAMEVERSE.php"><img src="./img/logo.png" alt="logo" width="80px"  ></a>
</head>
<body>
  <br>
  <br>
  <br>

    </div>
    <div class="login-box">
      <h2>Login</h2>
      <form action="index.php" method="post">
        <div class="user-box">
          <input type="text" name="nombre" required="">
          <label>nombre de usuario</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="">
          <label>contraseña</label>
        </div>
<br>


<br>     
<center><button class="btn4" type="submit">Enviar</button></center>
<center><a href="./register.html">¿no tienes cuenta?</a></center>

<?php
if (isset($_POST['nombre']) && isset($_POST['password'])) {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM usuarios WHERE nombre='$nombre'";

    // Después de verificar las credenciales y antes de redirigir
setcookie("nombreUsuario", $nombre, time() + 3600, "/"); // La cookie expirará en una hora

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // El nombre de usuario existe, ahora verifica la contraseña
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila['password'] == $password) {
          session_start();
            header("Location: GAMEVERSE.php");
            exit;
        } else {
          
            echo "<p class='mensaje-error'>Contraseña incorrecta. Intenta de nuevo.</p>";
        }
    } else {
       
        echo "<p class='mensaje-error'>Nombre de usuario incorrecto. Intenta de nuevo.</p>";
    }

    mysqli_close($conexion);
}
?>

<style>
  .mensaje-error {
      color: red; 
  }
</style>  
</form>



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

</body>

</html>
