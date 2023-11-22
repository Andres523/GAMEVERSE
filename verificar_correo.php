
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/VC.css">
    <title>Verificar Correo Electrónico</title>
</head>
<body>
<div class="login-box">
    <h2>Verificar Correo Electrónico</h2>
    <div class="p"><center>Se ha enviado un código de verificación a <?php echo $correoUsuario; ?>.</center></div>
    <form method="post">
    <br>
    <br>
    <div class="user-box">
    <input type="text" id="codigoVerificacion" name="codigoVerificacion" required>
        <label for="codigoVerificacion">Ingresa el código de verificación:</label>
    </div>
    <center><button class="btn4" type="submit">Verificar</button></center>
    <?php
session_start();

if (!isset($_SESSION['nombreUsuario'])) {
    header("Location: index.php");
    exit();
}

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$nombreUsuario = $_SESSION['nombreUsuario'];

$consultaDatos = "SELECT correo, codigo_verificacion FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

$correoUsuario = '';
$codigoVerificacion = '';

if ($resultadoDatos) {
    if ($fila = mysqli_fetch_assoc($resultadoDatos)) {
        $correoUsuario = !empty($fila['correo']) ? $fila['correo'] : '';
        $codigoVerificacion = !empty($fila['codigo_verificacion']) ? $fila['codigo_verificacion'] : '';
    }
}
 
mysqli_close($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoIngresado = trim($_POST['codigoVerificacion']); 

    if ($codigoIngresado === $codigoVerificacion) {
     
        header("Location: perfil.php");
        exit();
    } else {
        echo "Código de verificación incorrecto. Inténtalo de nuevo.";
    }
}
?>
    </form>
</div>
</div>
</body>
</html>
