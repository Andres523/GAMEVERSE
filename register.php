<!DOCTYPE html>
<html lang="ee">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/login.css">
    <title>register</title>
</head>
<body>
<div class="wrapper">
          <div class="one">
              <section>
                <img src="./img/terraria.jpg" alt="terraria">
                <img src="./img/wow.jpg" alt="wow">
                  <img src="./img/pubg.jpg" alt="pubg">
                  <img src="./img/minecraft.jpeg" alt="minecraft">
                  <img src="./img/fornite.jpg" alt="fornite">
              </section>
          </div>

          <div class="three">
              <section>
                  <img src="./img/mario.jpg" alt="mario">
                  <img src="./img/pokemon.jfif" alt="pokemon">
                  <img src="./img/animal-crossing-new-horizons---button-fin-1588641487551.jpg" alt="animalcrosing">
                  <img src="./img/The_Legend_of_Zelda_Breath_of_the_Wild.jpg" alt="zelda">
                  <img src="./img/super smash bros.jpg" alt="smash">
              </section>
              <hr>
      
          </div>
          <div class="login-box">
              <h2>register</h2>
              <form action="./register.php"method="post">
                <div class="user-box">
                  <input type="text" name="nombre" required="">
                  <label>nombre de usuario</label>
                </div>
                <div class="user-box">
                  <input type="password" name="password"required="">
                  <label>contraseña</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password_repetida"required="">
                    <label>repetir contraseña</label>
                  </div>
                  <div class="user-box">
                    <input type="email" name="correo"required="">
                    <label for="">correo</label>
                  </div>
                  <center><button class="btn4" type="submit" value="registrarse">Enviar</button></center>

                  <a href="https://www.facebook.com/"><img src="./img/facebook-logo-3-1.png" alt="facebook" width="40px"></a>
                   <a href="https://mail.google.com/"><img src="./img/logo-Gmail-1.png" alt="logo-Gmail-1" width="60px"></a>
                
           
           
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
      <br>
      <br>

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
    echo "<p style='color: red;'>Las contraseñas no coinciden. Intenta de nuevo.</p>";
    mysqli_close($conexion);
    exit;
}

// Verifica si el nombre de usuario ya existe en la base de datos
$consultaUsuario = "SELECT * FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario);



if (mysqli_num_rows($resultadoUsuario) > 0) {
    // El nombre de usuario ya existe, muestra un mensaje de error en rojo
    echo "<p style='color: red;'>El nombre de usuario ya está registrado. Por favor, elige otro nombre.</p>";
    mysqli_close($conexion);
    exit;
}

// Verifica si el correo ya existe en la base de datos
$consultaCorreo = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultadoCorreo = mysqli_query($conexion, $consultaCorreo);

if (mysqli_num_rows($resultadoCorreo) > 0) {
    // El correo ya existe, muestra un mensaje de error en rojo
    echo "<p style='color: red;'>El correo ya está registrado. Por favor, utiliza otro correo.</p>";
    mysqli_close($conexion);
    exit;
}

// Si llegamos a este punto, el nombre de usuario y el correo no existen, por lo que podemos insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, password, correo) VALUES ('$nombreUsuario', '$password', '$correo')";
error_reporting(E_ERROR | E_PARSE);
if (mysqli_query($conexion, $sql)) {
  echo " <p style='color: green;'>Registro exitoso. Ahora puedes iniciar sesión.</p>";
  header("Location: GAMEVERSE.php");
  exit;
} else {
echo "<p style='color: red;'>Error al registrar el usuario: </p>" . mysqli_error($conexion);
  header("Location: ./register.html");
  exit; 
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
 </form>

</body>
</html>