<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin.css">
    <title>Panel de Administración</title>
</head>
<body>
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
                            <button id="confirmarEliminar" onclick="eliminarUsuario()">Sí</button>
                            <button onclick="cerrarModal()">No</button>
                        </div>
                    </div>



                    <div class="tab">
                        <table >
                            <?php while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) : ?>
                                            <tr>
                                                <td>ID: <?php echo $usuario['id']; ?></td>
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
                                                <td>
                                                <form method="POST" action="admin.php">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                                                    <button type="button" onclick="editarUsuario(<?php echo $usuario['id']; ?>)">Editar</button>
                                                    <button type="button" onclick="configurarEliminar(<?php echo $usuario['id']; ?>)">Eliminar</button>
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

</style>