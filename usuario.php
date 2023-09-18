
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
        /* Estilo CSS aquí */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-top: 0;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        /* Botones */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Perfil */
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

        /* Enlaces */
        .link-container {
            text-align: center;
            margin-top: 20px;
        }

        .link {
            text-decoration: none;
            color: #007bff;
            margin: 0 20px;
            font-weight: bold;
            font-size: 16px;
        }

        .link:hover {
            text-decoration: underline;
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
    <span class="text">MENU</span></label>
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
</header>
    <div class="container">
        <div class="profile-header">
            <img src="imagen_de_perfil.jpg" alt="Foto de perfil" class="profile-picture">
            <h1 class="profile-name"><?php echo $datosUsuario['nombre']; ?></h1>
            <p class="profile-email"><?php echo $datosUsuario['correo']; ?></p>
        </div>
        
        <div class="link-container">
            <a href="#" class="link">Editar Perfil</a>
            <a href="./index.php" class="link">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>