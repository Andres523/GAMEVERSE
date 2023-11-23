<?php
session_start();

$nombreUsuario = '';

if (isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];
} else {
    header("Location: perfiljus.php");
    exit();
}

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/reset.css">
    <title>Restablecer Contraseña</title>
</head>
<body>
    
    <div class='login-box'>
    

   
        <form class='login-box' action='' method='post'>
            <h2>Restablecer Contraseña</h2> 
            <div class='user-box'>
                <input type='password' name='password' required>
                <label for='password'>Nueva Contraseña:</label>
            </div>

            <div class='user-box'>
                <input type='password' name='password_repeated' required>
                <label for='password_repeated'>Repetir Nueva Contraseña:</label>
            </div>
            
            <center><button class='btn4' type='submit'>Restablecer Contraseña</button> </center>    
            <br>
            

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = trim($_POST['password']);
                $password_repeated = trim($_POST['password_repeated']);

                if (empty($password) || empty($password_repeated) || $password !== $password_repeated) {
                    echo "<p class='error-message'>Las contraseñas no coinciden o están vacías.</p>";
                } else {
                    $consulta = "SELECT password FROM usuarios WHERE nombre = '$nombreUsuario'";
                    $resultado = mysqli_query($conexion, $consulta);

                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        $fila = mysqli_fetch_assoc($resultado);
                        $password_actual = $fila['password'];

                        if ($password === $password_actual) {
                            echo "<p class='error-message'>La nueva contraseña no puede ser igual a la actual.</p>";
                        } else {
                            $actualizarContrasena = "UPDATE usuarios SET password='$password' WHERE nombre='$nombreUsuario'";
                    
                            if (mysqli_query($conexion, $actualizarContrasena)) {
                                echo "<p class='success-message' style='color: green;'>Contraseña actualizada exitosamente.</p>";

                            }
                        }
                    } else {
                        echo "<p class='error-message'>Error al obtener la contraseña actual.</p>";
                    }
                }
            }
            ?>
            
            <center><button class="btn4"><a href="./perfilajus.php" style="text-decoration: none;">Volver</a></button></center>    
            <br>
            <br>

        

        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conexion);
?>

<style>
    /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
    @media only screen and (max-width: 1200px) {
  .info,
  .perfil,
  .deceados {
      width: 100%; 
      margin: 5px; 
      text-align: center;
  }


  }

</style>