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
<a href="./index.php">Atrás</a>
    <br>
	<center><h1>Panel de Administración</h1></center>
	<input id="radio1" type="radio" name="css-tabs" checked>
	<input id="radio2" type="radio" name="css-tabs">

	<div id="tabs">
		
		<label id="tab4" for="radio1">Usuarios</label>
        <label id="tab2" for="radio2">productos</label>
	</div>
	<div id="content">
		<section id="content1">

            <h2>Usuarios Registrados</h2>
                <h2>Buscar Usuarios</h2>
                <form method="GET">
                    <label for="buscarNombre">Buscar por Nombre:</label>
                    <input type="text" id="buscarNombre" name="buscarNombre">
                    <label for="buscarID">Buscar por ID:</label>
                    <input type="number" id="buscarID" name="buscarID">
                    <button type="submit">Buscar</button>
                </form>

                <?php
                session_start();

                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
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
                        if ($where !== "") {
                            $where .= " AND id = $id";
                        } else {
                            $where .= " WHERE id = $id";
                        }
                    }
                    $consulta .= $where;
                }
            
                $resultadoUsuarios = mysqli_query($conexion, $consulta);
            
                if (!$resultadoUsuarios) {
                    die("Error al obtener usuarios: " . mysqli_error($conexion));
                }
            
                ?>
                <table>
                    <?php while ($usuario = mysqli_fetch_assoc($resultadoUsuarios)) : ?>
                        <tr>
                            <td>ID: <?php echo $usuario['id']; ?></td>
                            <td>Nombre: <?php echo $usuario['nombre']; ?></td>
                            <td>Correo: <?php echo $usuario['correo']; ?></td>
                            <td>Contraseña: <?php echo $usuario['password']; ?></td>
                            <td>
                                <?php if ($usuario['imagenPerfil']): ?>
                                    <img class="profile-picture" src="<?php echo $usuario['imagenPerfil']; ?>" alt="imagen de perfil">
                                <?php else: ?>
                                    <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" onclick="editarUsuario(<?php echo $usuario['id']; ?>)">Editar</button>
                                <button type="button" onclick="eliminarUsuario(<?php echo $usuario['id']; ?>)">Eliminar</button>
                            </td>
                        </tr>
                        <tr><td colspan="6"><hr></td></tr>
                    <?php endwhile; ?>
                </table>
                                
                <script>
                function openTab(evt, tabName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(tabName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
            
                document.addEventListener("DOMContentLoaded", function() {
                    var usuariosTabButton = document.querySelector(".tablink:nth-child(1)");
                    usuariosTabButton.click(); 
                });
            </script>

                <?php
                mysqli_close($conexion);
                ?>

			


		</section>
		<section id="content2">
			<h3>Productos</h3>
			
		</section>

	</div>

</main>

</body>
</html>