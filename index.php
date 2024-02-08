<?php
header("Content-Type: text/html; charset=utf-8");
?>

<?php
session_start();

$loggedIn = isset($_SESSION['nombreUsuario']);

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

?>  
<?php
error_reporting (0);

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

$nombreUsuario = $_SESSION['nombreUsuario'];

$consulta = "SELECT Rol FROM usuarios WHERE nombre = '$nombreUsuario'";

$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
   
    $fila = mysqli_fetch_assoc($resultado);

    if ($fila) {
        $rol = $fila['Rol'];
        
    } 

    mysqli_free_result($resultado);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gameverse</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="./styles/style index.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <?php echo file_get_contents("style.css"); ?>
</head>
<body>
<script>
        document.addEventListener("DOMContentLoaded", function () {
            var settingsBtn = document.getElementById('settingsBtn');
            var settingsPopup = document.getElementById('settingsPopup');

            settingsBtn.addEventListener('click', function () {
                toggleSettingsPopup();
            });

            function toggleSettingsPopup() {
                var settingsPopup = document.getElementById('settingsPopup');
                if (settingsPopup.style.display === 'block') {
                    settingsPopup.style.display = 'none';
                    localStorage.setItem('settingsPopupState', 'none');
                } else {
                    settingsPopup.style.display = 'block';
                    localStorage.setItem('settingsPopupState', 'block');
                }
            }

            // Mostrar el estado inicial del menú de configuración
            var settingsPopupState = localStorage.getItem('settingsPopupState');
            if (settingsPopupState === 'block') {
                settingsPopup.style.display = 'block';
            } else {
                settingsPopup.style.display = 'none';
            }

            // Funciones para el modal de confirmación (opcional)
            function showConfirmationModal() {
                document.getElementById("confirmation-popup").style.display = "block";
            }

            function hideConfirmationModal() {
                document.getElementById("confirmation-popup").style.display = "none";
            }
        });
    </script>

    </div>
</div>



<div class="modal" id="confirmation-popup">
        <div class="modal-content">
            <p>¿Estás seguro de que deseas cerrar sesión?</p>
            <form method="post">
                <button type="submit" name="confirm-logout" id="confirm-button">Sí</button>
                <button type="button" id="cancel-button" onclick="hideConfirmationModal();">No</button>
            </form>
        </div>
</div>


<header class="main-header">
    <div class="button-container">
        <?php if (!$loggedIn): ?>
        <button class="btn-login"><a href="./Login.php">Iniciar Sesión</a></button>
        <button class="btn-register"><a href="./register.html">Registrarse</a></button>
        <?php else: ?>
        <div class="button" id="settingsBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none" class="svg-icon">
                <g stroke-width="1.5" stroke="#5d41de">
                    <circle r="2.5" cy="10" cx="10"></circle>
                    <path fill-rule="evenodd" d="m8.39079 2.80235c.53842-1.51424 2.67991-1.51424 3.21831-.00001.3392.95358 1.4284 1.40477 2.3425.97027 1.4514-.68995 2.9657.82427 2.2758 2.27575-.4345.91407.0166 2.00334.9702 2.34248 1.5143.53842 1.5143 2.67996 0 3.21836-.9536.3391-1.4047 1.4284-.9702 2.3425.6899 1.4514-.8244 2.9656-2.2758 2.2757-.9141-.4345-2.0033.0167-2.3425.9703-.5384 1.5142-2.67989 1.5142-3.21831 0-.33914-.9536-1.4284-1.4048-2.34247-.9703-1.45148.6899-2.96571-.8243-2.27575-2.2757.43449-.9141-.01669-2.0034-.97028-2.3425-1.51422-.5384-1.51422-2.67994.00001-3.21836.95358-.33914 1.40476-1.42841.97027-2.34248-.68996-1.45148.82427-2.9657 2.27575-2.27575.91407.4345 2.00333-.01669 2.34247-.97026z" clip-rule="evenodd"></path>
                </g>
            </svg>
            <span class="label">Configuracion</span>
            <div class="settings-popup" id="settingsPopup">
                <a href="./perfil.php"><button>Perfil</button></a>
                <a href="./perfilajus.php"><button>Editar perfil</button></a>
                <a href="./Report.php"><button>Reporte bugs</button></a>

                <?php if ($rol === 'Admin'): ?>
                <a href="admin2.php"><button>Administrador</button></a>
                <?php endif; ?>

                
                <form method="post">
                    <button type="submit" name="logout" onclick="showConfirmationModal();">Cerrar sesión</button>
                </form>
 
            </div>
        </div>
        <?php endif; ?>
    </div>

    <header class="main-header">
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
                <li><a href="./index.php">HOME</a></li>
                <li><a href="tienda.php">TIENDA</a></li>
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
    </div>
    <center><img src="./img/gameverse.jpg"/></center>
    <div style="background-color: #0A1850;">
        <br>
        <h2 class="h2" ><center>Nuevos títulos y descuentos</center></h2>
        <br>
        <?php

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta para obtener los juegos mejor valorados
$consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.cantidad, p.precio, p.imagen, p.video_mp4, p.categoria, AVG(c.calificacion) AS calificacion_promedio
             FROM productos p
             LEFT JOIN calificaciones c ON p.id = c.id_juego
             GROUP BY p.id
             ORDER BY calificacion_promedio DESC
             LIMIT 5"; 

$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    ?>
    <div class="carousel" data-flickity='{ "wrapAround": true }' style="background-color: #0A1850;">
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
            <div>
                <center><img class="carousel-cell" src="<?php echo $fila['imagen']; ?>"/></center>
                <h1 class="h3"><center><?php echo $fila['nombre']; ?></center></h1>
                <h2 class="descripcion"><center><?php echo $fila['descripcion']; ?></center></h2>
                <h3 class="h2"><center>Calificación: <?php echo round($fila['calificacion_promedio'], 1); ?></center></h3>
                <br>
                <div>
                    <center><button class="button-gameverse"><?php echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link"> DESCUBRIR </a> '?></button></center>
                </div>
                <br>
                <br>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>



    <br>
    <br>
    
    </div>
    <?php 
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT id, nombre, img, descripcion from novedades";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado) {
    ?>
    <div style="background-color: #E17349">
        <br><br>
        <h2 class="h2" ><center>Las novedades más recientes</center></h2>
        <?php if ($rol === 'Admin'): ?>
            <h2 class="h2"><center><a href="novedades.php">agregar novedades</a></center></h2>
        <?php endif; ?>
        <br>
        <div class="carousel-2" data-flickity='{ "wrapAround": true }'>
            <?php 
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $id = $fila["id"];
                $nombre = $fila["nombre"];
                $descripcion = $fila["descripcion"];
                $imagen = $fila["img"];
                ?>
                <div class="carousel-2-cell" style="background-color: #E5D6D0">
                    <center><img class="carousel-2 img" src="<?php echo $imagen; ?>" /></center>
                    
                    <h1><center><?php echo $nombre; ?></center></h1>
                    <br><br>
                    <h2><center><?php echo $descripcion; ?></center></h2>
                    <br><br>
                </div>
                <?php 
            } // Fin del bucle while
            ?>
        </div>
        <br><br><br>     
    </div>
    <?php 
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

  </div>

  </div>

    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    
    <footer style="background-color: #07113B";>
        <center>
        <h3 class="h2">Copyright 2023 Gameverse</h3>
        <div class="img-container">
        <img src="./img/twitter.jpg" alt="Twitter">
        <img src="./img/fb.jpg" alt="Facebook">
        <img src="./img/insta.jpg" alt="Instagram">
        </div>
        </center>
        <br>
    </footer>

</body>
</html>

