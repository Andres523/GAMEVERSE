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
    <link rel="stylesheet" href="./styles/stylegameverse.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>Perfil de Usuario</title>
    <style>
        /* Estilos para el perfil */
        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            padding: 20px 0;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 20px;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .profile-email {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }

        .edad {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }

        .fechaNacimiento {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }


    </style>
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
            <li><a href="">FANDOM</a></li>
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
    
    <div class="profile-container">
        <div class="profile-header">
            <!-- Aquí muestra la imagen de perfil, nombre, correo, edad y fecha de nacimiento del usuario -->
            <img src="<?php echo $datosUsuario['imagenPerfil']; ?>" alt="Foto de perfil" class="profile-picture">
            <h1 class="profile-name"><?php echo $datosUsuario['nombre']; ?></h1>
            <br>
            <p class="genero"><?php echo $datosUsuario['genero']; ?></p>
            <p class="profile-email"><?php echo $datosUsuario['correo']; ?></p>
            <p class="edad">Edad: <?php echo $datosUsuario['edad']; ?></p>
            <p class="fechaNacimiento">Fecha de Nacimiento: <?php echo $datosUsuario['fechaNacimiento']; ?></p>
        
            <div class="profile-container">
    <div class="profile-header">
        <!-- ... -->
    </div>
    
    <div class="action-buttons">
        <a href="./editarusuario.php" class="edit-link">Editar Información</a>
        <a href="./index.php">Cerrar sesión</a>
    </div>
</div>



<style>
    .profile-container {
    /* coloquen lo que quieran pa editar*/
}

.profile-header {

}

.action-buttons {
    text-align: center; 

}

.action-buttons a {
    margin-left: 200px; 
    
}
</style>
</body>
</html>
