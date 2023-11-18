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

$consultaDatos = "SELECT correo, ubicacion, edad, genero FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

if ($resultadoDatos) {
    if ($fila = mysqli_fetch_assoc($resultadoDatos)) {
        $correo = !empty($fila['correo']) ? $fila['correo'] : 'Por completar';
        $localidad = !empty($fila['ubicacion']) ? $fila['ubicacion'] : 'Por completar';
        $edad = !empty($fila['edad']) ? $fila['edad'] : 'Por completar'; 
        $genero = !empty($fila['genero']) ? $fila['genero'] : 'Por completar';
        $imagenPerfil = !empty($fila['imagenPerfil']) ? $fila['imagenPerfil'] : null; 
    } else {
        $correo = 'Por completar';
        $localidad = 'Por completar';
        $edad = 'Por completar';
        $genero = 'Por completar';
        echo "No se encontraron resultados para el usuario '$nombreUsuario'.";
    }
} else {
    $correo = 'Por completar';
    $localidad = 'Por completar';
    $edad = 'Por completar';
    $genero = 'Por completar';
    echo "Error en la consulta: " . mysqli_error($conexion);
}

if (isset($_POST['logout'])) {
    echo '<script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById("confirmation-popup").style.display = "block";
            });
          </script>';
}

if (isset($_POST['confirm-logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

mysqli_close($conexion);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <title>PERFIL</title>
    <link rel="stylesheet" href="./styles/usuario.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <script src="./javascript.js"></script>

    <!-- sonic movimiento -->
    <style>
        .moving-image {
            position: relative;
            animation: moveRight 2s linear infinite;
        }

        @keyframes moveRight {
            0% { left: 0; }
            100% { left: calc(90% - 60px); }
        }
    </style>
</head>
<body>
<a href="././index.php" style="display: inline-block;"><button>ATRAS</button></a>
</a>
<div class="moving-image" style="display: inline-block; vertical-align: top;">
    <img src="./img marketplace/SONIC.gif" alt="" width="80px">
</div>

    <br>
    <div class="info">
        <div class="item">      
            <center><h1>PERFIL</h1></center> 
            <hr>
            <br>
            <label for="edad"><h2>Edad: </h2><?php echo $edad; ?></label>
            <br>
            <br>
            <label for="genero"><h2>Genero: </h2><?php echo $genero; ?></label>
            <br>
            <br>
            <label for="correo"><h2>correo: </h2><?php echo $correo; ?></label>
            <br>
            <br>
            <label for="localidad"><h2>localidad: </h2><?php echo $localidad; ?></label>

            </div>

            <div class="perfil">
                <div class="item">
                <?php if ($imagenPerfil): ?>
                <img class="profile-picture" src="data:image/jpeg;base64,<?php echo base64_encode($imagenPerfil); ?>" alt="imagen de perfil">
                <?php else: ?>
                <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
                <?php endif; ?>
                
                <label for="cambiar" name="perfil"></label>
                <center><h1><label for="usuario"><?php echo $nombreUsuario; ?></label></h1></center>
                </div>
                <br>
                <center><a href="./perfilajus.php" style="display: inline-block;"><button>EDITAR PERFIL</button></a></center>
            </div>

            <div class="deceados">
            <label for=""><h1 style="text-align: center;">DESEADOS</h1></label>
            <hr>
            </div>

    </div>
</body>

<div class="modal" id="confirmation-popup">
        <div class="modal-content">
            <p>¿Estás seguro de que deseas cerrar sesión?</p>
            <form method="post">
                <button type="submit" name="confirm-logout" id="confirm-button">Sí</button>
                <button type="button" id="cancel-button" onclick="hideConfirmationModal();">No</button>
            </form>
        </div>
    </div>
    <form method="post">
                    <button type="submit" name="logout" onclick="showConfirmationModal();">CERRAR SESION</button>
    </form>



</form>


    

</html>