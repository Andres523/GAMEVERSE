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

$consultaDatos = "SELECT correo, ubicacion, edad, genero, imagenPerfil, Rol , color, fondo FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

if ($resultadoDatos) {
    if ($fila = mysqli_fetch_assoc($resultadoDatos)) {
        $correo = !empty($fila['correo']) ? $fila['correo'] : 'Por completar';
        $localidad = !empty($fila['ubicacion']) ? $fila['ubicacion'] : 'Por completar';
        $edad = !empty($fila['edad']) ? $fila['edad'] : 'Por completar'; 
        $genero = !empty($fila['genero']) ? $fila['genero'] : 'Por completar';
        $rol = $fila['Rol'];
        $imagenPerfil = !empty($fila['imagenPerfil']) ? $fila['imagenPerfil'] : null; 
        $colorFondo = $fila['color'];
        $fondo = $fila['fondo'];
    } else {
        $correo = 'Por completar';
        $localidad = 'Por completar';
        $edad = 'Por completar';
        $genero = 'Por completar';
        $imagenPerfil = null;
        echo "No se encontraron resultados para el usuario '$nombreUsuario'.";
    }
} else {
    $correo = 'Por completar';
    $localidad = 'Por completar';
    $edad = 'Por completar';
    $genero = 'Por completar';
    $imagenPerfil = null;
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
<body id="bodyBackground" style="background-color: <?php echo $colorFondo; ?>; background-image: url('<?php echo $fondo; ?>');">
    <a href="./index.php" style="display: inline-block;"><button>ATRAS</button></a>

    <div class="spinner-overlay">
    <div class="spinner">
     


        <style>

        .spinner:before {
          transform: rotateX(60deg) rotateY(45deg) rotateZ(45deg);
          animation: 750ms rotateBefore infinite linear reverse;
        }

        .spinner:after {
          transform: rotateX(240deg) rotateY(45deg) rotateZ(45deg);
          animation: 750ms rotateAfter infinite linear;
        }

        .spinner:before,
        .spinner:after {
          box-sizing: border-box;
          content: '';
          display: block;
          position: absolute;
          margin-top: -5em;
          margin-left: -5em;
          width: 10em;
          height: 10em;
          transform-style: preserve-3d;
          transform-origin: 50%;
          transform: rotateY(50%);
          perspective-origin: 50% 50%;
          perspective: 300px;
          background-size: 10em 10em;
          background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjI2NnB4IiBoZWlnaHQ9IjI5N3B4IiB2aWV3Qm94PSIwIDAgMjY2IDI5NyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CiAgICA8dGl0bGU+c3Bpbm5lcjwvdGl0bGU+CiAgICA8ZGVzY3JpcHRpb24+Q3JlYXRlZCB3aXRoIFNrZXRjaCAoaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoKTwvZGVzY3JpcHRpb24+CiAgICA8ZGVmcz48L2RlZnM+CiAgICA8ZyBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBza2V0Y2g6dHlwZT0iTVNQYWdlIj4KICAgICAgICA8cGF0aCBkPSJNMTcxLjUwNzgxMywzLjI1MDAwMDM4IEMyMjYuMjA4MTgzLDEyLjg1NzcxMTEgMjk3LjExMjcyMiw3MS40OTEyODIzIDI1MC44OTU1OTksMTA4LjQxMDE1NSBDMjE2LjU4MjAyNCwxMzUuODIwMzEgMTg2LjUyODQwNSw5Ny4wNjI0OTY0IDE1Ni44MDA3NzQsODUuNzczNDM0NiBDMTI3LjA3MzE0Myw3NC40ODQzNzIxIDc2Ljg4ODQ2MzIsODQuMjE2MTQ2MiA2MC4xMjg5MDY1LDEwOC40MTAxNTMgQy0xNS45ODA0Njg1LDIxOC4yODEyNDcgMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IDE0NS4yNzczNDQsMjk2LjY2Nzk2OCBDMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IC0yNS40NDkyMTg3LDI1Ny4yNDIxOTggMy4zOTg0Mzc1LDEwOC40MTAxNTUgQzE2LjMwNzA2NjEsNDEuODExNDE3NCA4NC43Mjc1ODI5LC0xMS45OTIyOTg1IDE3MS41MDc4MTMsMy4yNTAwMDAzOCBaIiBpZD0iUGF0aC0xIiBmaWxsPSIjMDAwMDAwIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj48L3BhdGg+CiAgICA8L2c+Cjwvc3ZnPg==);
        }
        /* sitNSpin.less */
        @keyframes rotateBefore {
          from {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(0deg);
          }

          to {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(-360deg);
          }
        }

        @keyframes rotateAfter {
          from {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(0deg);
          }

          to {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(360deg);
          }
        }
            .spinner-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999; 
                display: none; 
            }


            .spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
 

            
            }


        </style>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.spinner-overlay').style.display = 'block';
    });

    window.addEventListener('load', function() {
        document.querySelector('.spinner-overlay').style.display = 'none';
    });

   
    window.addEventListener('beforeunload', function(event) {
        
        document.querySelector('.spinner-overlay').style.display = 'none';
    });
        </script>

    </div>
</div>
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
            <label for="genero"><h2>Género: </h2><?php echo $genero; ?></label>
            <br>
            <br>
            <label for="correo"><h2>Correo: </h2><?php echo $correo; ?></label>
            <br>
            <br>
            <label for="localidad"><h2>Localidad: </h2><?php echo $localidad; ?></label>
        </div>

        <div class="perfil">
        <center><p style="color: #8803f4;"> <h3 >Tu rol es: </h3></p><?php  echo $rol?></center>
            <div class="item">
                
                <?php if ($imagenPerfil): ?>
                    <img class="profile-picture" src="<?php echo $imagenPerfil; ?>" alt="imagen de perfil">
                <?php else: ?>
                    <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
                <?php endif; ?>
                
                <label for="cambiar" name="perfil"></label>
                <center><h1><label for="usuario"><?php echo $nombreUsuario; ?></label></h1></center>
            </div>
            <br>
            <center><a href="./perfilajus.php" style="display: inline-block;"><button>EDITAR PERFIL</button></a></center>
        </div>

        <div class="deseados">
            <label for=""><h1 style="text-align: center;">DESEADOS</h1></label>
            <hr>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates iusto animi totam dolorem natus consequuntur, numquam odit laboriosam modi, qui dolorum. Eaque repellendus numquam dolor laborum, ipsam iusto! Velit, modi!</p>
        </div>
    </div>

    <form method="post">
        <button type="submit" name="logout" onclick="showConfirmationModal();">CERRAR SESIÓN</button>
    </form>

    <div class="modal" id="confirmation-popup">
        <div class="modal-content">
            <p>¿Estás seguro de que deseas cerrar sesión?</p>
            <form method="post">
                <button type="submit" name="confirm-logout" id="confirm-button">Sí</button>
                <button type="button" id="cancel-button" onclick="hideConfirmationModal();">No</button>
            </form>
        </div>
    </div>
</body>
</html>

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