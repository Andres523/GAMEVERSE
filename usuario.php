<?php
session_start();

// Verificar si la cookie existe
if (isset($_COOKIE['nombreUsuario'])) {
    $nombreUsuario = $_COOKIE['nombreUsuario'];

    // Conectar a la base de datos y obtener los datos del usuario
    $conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM usuarios WHERE nombre='$nombreUsuario'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Obtiene los datos del usuario
        $datosUsuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Error al obtener los datos del usuario.";
    }

    mysqli_close($conexion);
} else {
    echo "Bienvenido, invitado";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/usuario.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>Perfil de Usuario</title>
 
</head>
<body>
    <header class="main-header"></header>
    
    <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i>
        <span class="icon">
            <svg viewBox="0 0 175 80" width="60" height="40">
                <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
            </svg>
        </span>
        <span class="text">MENU</span>
    </label>
    <input type="checkbox" id="btn-nav"> 
            
    <nav>
        <ul class="navigation">
            <li><a href="./GAMEVERSE.php">HOME</a></li>
            <li><a href="./tienda.html">TIENDA</a></li>
            <li><a href="./marketplace.html">MARKETPLACE</a></li>
        </ul>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <aside>
            <a href="https://www.facebook.com/"><img src="./img/facebook-logo-3-1.png" alt="facebook-logo-3-1" width="50px"></a>
            <a href="https://twitter.com/"><img src="./img/Logo_of_Twitter.svg.png" alt="Logo_of_Twitter" width="70px"></a>
            <a href="https://www.instagram.com/?hl=en"><img src="./img/Instagram-Logosu.png" alt="Instagram-Logosu" width="80px"></a>
        </aside>
    </nav>

<div class="padre">


        <div class="profile-container" >
            <img src="<?php echo $datosUsuario['imagenPerfil']; ?>" alt="Foto de perfil" class="profile-picture">
            <h1 class="profile-name"><?php echo $datosUsuario['nombre']; ?></h1>
        </div>


    <div class="profile-container2" >

        <div class="profile-header">

            <!-- Aquí muestra  nombre, correo, edad, género y fecha de nacimiento del usuario -->
            <p class="genero"><?php echo $datosUsuario['genero']; ?></p>
            <p class="edad">Edad: <?php echo $datosUsuario['edad']; ?></p>
            <p class="fechaNacimiento">Fecha de Nacimiento: <?php echo $datosUsuario['fechaNacimiento']; ?></p>
            <p class="ubicacion">Pais: <?php echo $datosUsuario['ubicacion']; ?></p>
            <p class="profile-email">Correo: <?php echo $datosUsuario['correo']; ?></p>
            
            
            
        
    
            <div class="action-buttons">

                <a href="./editarusuario.php" class="edit-link">
                    <button class="btn" type="button">
                         Editar informacion
                    </button>
                </a>
                <br>
                <a href="./index.php" class="edit-link">
                    <button class="btn" type="button">
                         Cerrar Sesion
                    </button>
                </a>


                
            </div>
        </div>
    
    </div>
 
    <div class="profile-container3" >
        <h1>tus ultimas publicaciones</h1>
        <hr>
    </div>

</div>



<img src="./img marketplace/SONIC.gif" alt="sonic" class="moving-image">
    <hr size="5" width="150%">
</body>
</html>
