<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin.css">
    <title>Panel de Administración</title>
</head>
<body>
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
    <main>
        <div class="login-box">
            <a href="./index.php" ><button class="btn4">Atrás</button></a>
            <br>
            <center><h1>Panel de Administración</h1></center>
        
            <input id="radio1" type="radio" name="css-tabs" checked>
            <input id="radio2" type="radio" name="css-tabs">
        
            <div id="tabs">
                <label id="tab4" for="radio1">Usuarios</label>
                <label id="tab2" for="radio2">Productos</label>
            </div>

            <div id="content">
                <section id="content1">
                    <h2>Buscar Usuarios</h2>
                    <form method="GET">
                        <div class='user-box'>
                            <label for="buscarNombre" >Buscar por Nombre:</label>
                            <input type="text" id="buscarNombre" name="buscarNombre">
    
                            <label for="buscarID">Buscar por ID:</label>
                            <input type="number" id="buscarID" name="buscarID">
    
                            <button type="submit" class="btn4">Buscar</button>
                        </div>
                    </form>
                    
                    

                    <?php
                    session_start();

                    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                    if (!$conexion) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }

                    
                    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['eliminar_usuario'])) {
                        $id_usuario = $_POST['id_usuario'];

                        $consulta_eliminar = "DELETE FROM usuarios WHERE id = $id_usuario";

                        if (mysqli_query($conexion, $consulta_eliminar)) {
                            echo "<script>mostrarVentanaModal();</script>"; 
                        } else {
                            echo "Error al eliminar usuario: " . mysqli_error($conexion);
                        }
                    }

                    $consulta = "SELECT id, nombre, correo, password, imagenPerfil FROM usuarios";

                    if ($_SERVER["REQUEST_METHOD"] == "GET" && (isset($_GET['buscarNombre']) || isset($_GET['buscarID']))) {
                        $where = "";
                        if (!empty($_GET['buscarNombre'])) {
                            $nombre = mysqli_real_escape_string($conexion, $_GET['buscarNombre']);
                            $where .= " WHERE nombre LIKE '%$nombre%'";
                        }
                        if (!empty($_GET['buscarID'])) {
                            $id = mysqli_real_escape_string($conexion, $_GET['buscarID']);
                            $where .= ($where !== "") ? " AND id = $id" : " WHERE id = $id";
                        }
                        $consulta .= $where;
                    }

                    $resultadoUsuarios = mysqli_query($conexion, $consulta);

                    if (!$resultadoUsuarios) {
                        die("Error al obtener usuarios: " . mysqli_error($conexion));
                    }
                    ?>

                    <div id="modal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarModal()">&times;</span>
                            <p>¿Estás seguro de que quieres eliminar este usuario?</p>
                            <button class="button" id="confirmarEliminar" onclick="eliminarUsuario()"><span class="button-content">Sí</span> </button>
                            <button class="button" onclick="cerrarModal()"><span class="button-content">No</span></button>
                        </div>
                    </div>



                    <div class="tab">
                        <table >
                            <?php while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) : ?>
                                            <tr>
                                                <td ><?php echo $usuario['id']; ?></td>
                                                <td>Nombre: <br><?php echo $usuario['nombre']; ?></td>
                                                <td>Correo: <br><?php echo $usuario['correo']; ?></td>
                                                <td>Contraseña: <br><?php echo $usuario['password']; ?></td>
                                                <td>
                                                    <?php if ($usuario['imagenPerfil']): ?>
                                                        <img class="profile-picture" src="<?php echo $usuario['imagenPerfil']; ?>" alt="imagen de perfil">
                                                    <?php else: ?>
                                                        <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
                                                    <?php endif; ?>
                                                </td>
                                                <td style="text-align: right;">
                                                <form method="POST" action="admin.php">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                                                    <button class="edit-button" type="button" onclick="editarUsuario(<?php echo $usuario['id']; ?>)"><svg class="edit-svgIcon" viewBox="0 0 512 512">
                                                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                                    </svg></button>
                                                    
                                                    <button class="delete-button" type="button" onclick="configurarEliminar(<?php echo $usuario['id']; ?>)"><svg class="delete-svgIcon" viewBox="0 0 448 512">
                                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                                    </svg></button>
                                                </form>
                                                </td>
                                            </tr>
                                <tr><td colspan="6"><hr></td></tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </section>
                                                    
                <section id="content2">
                    <h3>Productos</h3>
                    <!-- Sección para administrar productos -->
                    <!-- ... (código relacionado con productos) ... -->
                </section>
            </div>
        </div>

    </main>
</body>
</html>

<script>
    function configurarEliminar(idUsuario) {
        // Configura el ID del usuario en el botón "Confirmar eliminar" del modal
        document.getElementById('confirmarEliminar').setAttribute('data-id-usuario', idUsuario);
        // Muestra el modal
        document.getElementById('modal').style.display = 'block';
    }

    function eliminarUsuario() {
        const idUsuario = document.getElementById('confirmarEliminar').getAttribute('data-id-usuario');

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Usuario eliminado correctamente');
                    location.reload();
                } else {
                    console.error('Error al eliminar usuario:', xhr.responseText);
                }
            }
        };

        xhr.open('POST', 'eliminar_usuario.php'); 
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('id_usuario=' + idUsuario);

        cerrarModal();
    }

    function cerrarModal() {
        document.getElementById('modal').style.display = 'none';
    }
</script>

<style>
    
main {
	max-width: 800px;
	height: 600px;
	margin: 30px auto;
	background: #2d2f33;
	padding: 30px;
	box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
}	
</style>

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
	  
  .tab table {
		width: 100%;
		border-collapse: collapse;
	  }
	
	  .tab td {
		padding: 10px; /* Ajusta el relleno interno de cada celda */
	  }
	
	  .tab tr {
		height: 10px; /* Ajusta la altura de cada fila */
	  }
</style>