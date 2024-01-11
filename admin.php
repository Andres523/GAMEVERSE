
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
                                <div class="container">
                                    <div class="modal-box">
                                        <span class="close" onclick="cerrarModal()">&times;</span>
                            
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h3 class="title">¡CUIDADO!</h3>
                                                <p class="description"><h2>¿Estás seguro de eliminar este usuario?</h2></p>
                                                <div class="modal-icon">
                                                <img src="./iconos/block-user.png" alt="icono" style="width: 110px; height: 110px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <button class="button" id="confirmarEliminar" onclick="eliminarUsuario()"><span class="button-content">Sí</span> </button>
                                <button class="button" onclick="cerrarModal()"><span class="button-content">No</span></button>
                            </div>
                        </div> 

                        <div id="modalEditar" class="modal">
                            <div class="modal-content">
                                <div class="container">

                                    <input type="hidden" id="idUsuarioEditar" value="">
                                    <input type="text" id="nombreUsuarioEditar" placeholder="Nombre">
                                    <input type="email" id="correoUsuarioEditar" placeholder="Correo">
                                    <input type="password" id="contrasenaUsuarioEditar" placeholder="Contraseña">

                                    <label class="container">
                                      <input type="checkbox" checked="checked">
                                      <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                                      <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
                                    </label>

                                    <button class="button" onclick="guardarCambiosUsuario()">Guardar Cambios</button>
                                    <button class="button" onclick="cerrarModalEditar()">Cerrar</button>
                                    <script>
                                    function toggleMostrarContrasena() {
                                        const contrasenaInput = document.getElementById('contrasenaUsuarioEditar');
                                        if (contrasenaInput.type === 'password') {
                                            contrasenaInput.type = 'text';
                                        } else {
                                            contrasenaInput.type = 'password';
                                        }
                                    }
                                    </script>
                                </div>
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
                                                        <button class="edit-button" type="button" onclick="abrirModalEditar(
                                                        <?php echo $usuario['id']; ?>,
                                                        '<?php echo $usuario['nombre']; ?>',
                                                        '<?php echo $usuario['correo']; ?>',
                                                        '<?php echo $usuario['password']; ?>'
                                                        )"><svg class="edit-svgIcon" viewBox="0 0 512 512">
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
                        <section id="content2">
    <h3>Productos</h3>
    <button id="openModalBtn">Agregar Producto</button>
</section>

                                    <div id="modal" class="modal">
                                        <div class="modal-content">
                                            <span class="close" id="closeModalBtn">&times;</span>
                                            <form id="productForm">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" id="nombre" name="nombre" required>
                                                                                            
                                                <label for="descripcion">Descripción:</label>
                                                <textarea id="descripcion" name="descripcion" required></textarea>
                                                                                            
                                                <label for="requisitos">Requisitos:</label>
                                                <input type="text" id="requisitos" name="requisitos" required>
                                                                                            
                                                <label for="cantidad">Cantidad:</label>
                                                <input type="number" id="cantidad" name="cantidad" required>
                                                                                            
                                                <label for="precio">Precio:</label>
                                                <input type="number" id="precio" name="precio" required>
                                                                                            
                                                <label for="imagen">Imagen:</label>
                                                <input type="file" id="imagen" name="imagen" accept="image/*" required>
                                                                                            
                                                <button type="submit">Guardar</button>
                                            </form>
                                        </div>
                                    </div>
                    </section>
  
                </div>
            </div>

        </main>
    </body>
    </html>

    <script>
    function configurarEliminar(idUsuario) {
        document.getElementById('confirmarEliminar').setAttribute('data-id-usuario', idUsuario);
        document.getElementById('modal').style.display = 'block';

    
        document.getElementById('confirmarEliminar').addEventListener('click', eliminarUsuario);
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

        function abrirModalEditar(idUsuario, nombre, correo, contrasena) {
            document.getElementById('idUsuarioEditar').value = idUsuario;
            document.getElementById('nombreUsuarioEditar').value = nombre;
            document.getElementById('correoUsuarioEditar').value = correo;
            document.getElementById('contrasenaUsuarioEditar').value = contrasena;

            document.getElementById('modalEditar').style.display = 'block';
        }

        function guardarCambiosUsuario() {
        
            const idUsuario = document.getElementById('idUsuarioEditar').value;
            const nuevoNombre = document.getElementById('nombreUsuarioEditar').value;
            const nuevoCorreo = document.getElementById('correoUsuarioEditar').value;
            const nuevaContrasena = document.getElementById('contrasenaUsuarioEditar').value;

        

        
            cerrarModalEditar();
        }


    function cerrarModalEditar() {
        document.getElementById('modalEditar').style.display = 'none';
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


        @media only screen and (max-width: 1200px) {
    .info,
    .perfil,
    .deceados {
        width: 100%; 
        margin: 5px; 
        text-align: center;
    }


    }
        

        main {
            max-width: 800px;
            height: 600px;
            margin: 30px auto;
            background: #2d2f33;
            padding: 30px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
        }

    
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
            padding: 10px; 
        }

        .tab tr {
            height: 10px; 
        }
    </style>
    <script>
        function guardarCambiosUsuario() {
    const idUsuario = document.getElementById('idUsuarioEditar').value;
    const nuevoNombre = document.getElementById('nombreUsuarioEditar').value;
    const nuevoCorreo = document.getElementById('correoUsuarioEditar').value;
    const nuevaContrasena = document.getElementById('contrasenaUsuarioEditar').value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Datos actualizados correctamente');
         
            } else {
                console.error('Error al actualizar datos:', xhr.responseText);
            }
        }
    };

    xhr.open('POST', 'guardar_cambios_usuario.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`id_usuario=${idUsuario}&nuevo_nombre=${nuevoNombre}&nuevo_correo=${nuevoCorreo}&nueva_contrasena=${nuevaContrasena}`);

    cerrarModalEditar();
}
function guardarCambiosUsuario() {
    const idUsuario = document.getElementById('idUsuarioEditar').value;
    const nuevoNombre = document.getElementById('nombreUsuarioEditar').value;
    const nuevoCorreo = document.getElementById('correoUsuarioEditar').value;
    const nuevaContrasena = document.getElementById('contrasenaUsuarioEditar').value;

    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Datos actualizados correctamente');
                location.reload(); 
            } else {
                console.error('Error al actualizar datos:', xhr.responseText);
            }
        }
    };

    xhr.open('POST', 'guardar_cambios_usuario.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(`id_usuario=${idUsuario}&nuevo_nombre=${nuevoNombre}&nuevo_correo=${nuevoCorreo}&nueva_contrasena=${nuevaContrasena}`);
}

    </script>