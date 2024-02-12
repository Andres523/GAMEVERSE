<?php
session_start();

if (isset($_SESSION['nombreUsuario'])) {
    
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombreUsuario = $_SESSION['nombreUsuario'];

    $consulta_id_usuario = "SELECT id FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultado_id_usuario = mysqli_query($conexion, $consulta_id_usuario);

    if ($resultado_id_usuario) {
        $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
        $id_usuario = $fila_id_usuario['id'];

        if (isset($_GET['id'])) {
            $id_juego = $_GET['id'];

            // Consulta para obtener los detalles del juego
            $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, p.cantidad, GROUP_CONCAT(c.nombre SEPARATOR ', ') AS categorias
            FROM productos p
            LEFT JOIN categorias c ON FIND_IN_SET(c.id, p.categoria)
            WHERE p.id = $id_juego
            GROUP BY p.id";

            




            $resultado = mysqli_query($conexion, $consulta);

            if (mysqli_num_rows($resultado) > 0) {
                $fila = mysqli_fetch_assoc($resultado);

                // Consulta para obtener el promedio de las calificaciones del juego
                $consulta_promedio = "SELECT AVG(calificacion) AS promedio FROM calificaciones WHERE id_juego = $id_juego";
                $resultado_promedio = mysqli_query($conexion, $consulta_promedio);
                $fila_promedio = mysqli_fetch_assoc($resultado_promedio);
                $promedio_calificaciones = $fila_promedio['promedio'];

                // Consulta para obtener los comentarios del juego
                $consulta_comentarios = "SELECT u.nombre as nombre_usuario, u.imagenPerfil, c.id_usuario, c.calificacion, c.comentario, c.fecha 
                    FROM calificaciones c 
                    INNER JOIN usuarios u ON c.id_usuario = u.id 
                    WHERE c.id_juego = $id_juego";
                $resultado_comentarios = mysqli_query($conexion, $consulta_comentarios);

                // Verificar si el usuario ha comprado el juego
                $consulta_compra = "SELECT * FROM compras WHERE id_usuario = $id_usuario AND id_producto = $id_juego";
                $resultado_compra = mysqli_query($conexion, $consulta_compra);
                $loggedIn = mysqli_num_rows($resultado_compra) > 0;

               
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calificacion']) && isset($_POST['comentario'])) {
                    $calificacion = $_POST['calificacion'];
                    $comentario = $_POST['comentario'];

                   
                    $consulta_verificar_calificacion = "SELECT * FROM calificaciones WHERE id_juego = $id_juego AND id_usuario = $id_usuario";
                    $resultado_verificar_calificacion = mysqli_query($conexion, $consulta_verificar_calificacion);

                    if (mysqli_num_rows($resultado_verificar_calificacion) > 0) {
                        
                        $actualizar_calificacion = "UPDATE calificaciones SET calificacion = $calificacion, comentario = '$comentario' WHERE id_juego = $id_juego AND id_usuario = $id_usuario";
                        $resultado_actualizar_calificacion = mysqli_query($conexion, $actualizar_calificacion);
                        if ($resultado_actualizar_calificacion) {
                            echo '

                            <style>
                            body {
                                margin: 0;
                                padding: 0;
                                background-color: #000;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                            }
                            
                            .card {
                                width: 900px;
                                height: 400px;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                gap: 10px;
                                padding: 15px;
                                background-color: red;
                                border-radius: 10px;
                                border: none;
                                font-size: 70px;
                             
                                color: white;
                                position: relative;
                                cursor: pointer;
                                font-weight: 900;
                                transition-duration: .2s;
                                background: linear-gradient(0deg, #000, #272727);
                            }
                        
                            .card:before, .card:after {
                                content: "";
                                position: absolute;
                                left: -2px;
                                top: -2px;
                                border-radius: 10px;
                                background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00,#ffff00, #ff0000, #fb0094, 
                                    #0000ff, #00ff00,#ffff00, #ff0000);
                                background-size: 400%;
                                width: calc(100% + 4px);
                                height: calc(100% + 4px);
                                z-index: -1;
                                animation: steam 20s linear infinite;
                            }
                        
                            @keyframes steam {
                                0% {
                                    background-position: 0 0;
                                }
                        
                                50% {
                                    background-position: 400% 0;
                                }
                        
                                100% {
                                    background-position: 0 0;
                                }
                            }
                        
                            .card:after {
                                filter: blur(100px);
                            }
                        </style>
                        </head>
                        <body>
                        <div class="card">¡Gracias por tu comentario!</div>';

                            header("refresh:1;url=tienda.php");
                            exit();
                        } else {
                            echo "Error al actualizar la calificación: " . mysqli_error($conexion);
                        }
                    } else {
                        // Si el usuario no ha calificado el juego, insertar una nueva calificación
                        $insertar_calificacion = "INSERT INTO calificaciones (id_usuario, id_juego, calificacion, comentario, fecha) VALUES ($id_usuario, $id_juego, $calificacion, '$comentario', NOW())";
                        $resultado_insertar_calificacion = mysqli_query($conexion, $insertar_calificacion);
                        if ($resultado_insertar_calificacion) {
                            echo '                            <style>
                            body {
                                margin: 0;
                                padding: 0;
                                background-color: #000;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 100vh;
                            }
                            
                            .card {
                                width: 900px;
                                height: 400px;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                gap: 10px;
                                padding: 15px;
                                background-color: red;
                                border-radius: 10px;
                                border: none;
                                font-size: 70px;
                             
                                color: white;
                                position: relative;
                                cursor: pointer;
                                font-weight: 900;
                                transition-duration: .2s;
                                background: linear-gradient(0deg, #000, #272727);
                            }
                        
                            .card:before, .card:after {
                                content: "";
                                position: absolute;
                                left: -2px;
                                top: -2px;
                                border-radius: 10px;
                                background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00,#ffff00, #ff0000, #fb0094, 
                                    #0000ff, #00ff00,#ffff00, #ff0000);
                                background-size: 400%;
                                width: calc(100% + 4px);
                                height: calc(100% + 4px);
                                z-index: -1;
                                animation: steam 20s linear infinite;
                            }
                        
                            @keyframes steam {
                                0% {
                                    background-position: 0 0;
                                }
                        
                                50% {
                                    background-position: 400% 0;
                                }
                        
                                100% {
                                    background-position: 0 0;
                                }
                            }
                        
                            .card:after {
                                filter: blur(100px);
                            }
                        </style>
                        </head>
                        <body>
                        <div class="card">¡Gracias por tu comentario!</div>';
                            header("refresh:1;url=tienda.php");
                            exit();
                        } else {
                            echo "Error al insertar la calificación: " . mysqli_error($conexion);
                        }
                    }
                }

                ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="./styles/stylejuego.css">
                    <link rel="shortcut icon" href="../img/logo.png">
                    <title>Detalles del Juego</title>
                    <link
                      rel="stylesheet"
                      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
                    />
                            
                    <link
                      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
                      rel="stylesheet"
                    />
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

                <div class="main-content">
                    <center>
                        <?php
                        echo '<video width="1000px" controls autoplay loop="1" controls>';
                        echo '<source src="' . $fila['video_mp4'] . '" type="video/mp4">';
                        echo '</video>';
                        ?>
                    </center>
                </div>

                <div class="game-bar">
                    <?php
                    echo '<img class="game-image" src="' . $fila['imagen'] . '" alt="Imagen del juego' . $fila['nombre'] . '">';
                    ?>

                    <div class="game-info">
                        <?php
                        echo '<center>'.'<h2>' . $fila['nombre'] . '</h2>'.'</center>';
                        echo '<br>'
                        ?>
                        <h3>DESCRIPCION</h3>
                        <?php
                        echo '<p>' . $fila['descripcion'] . '</p>';
                        ?>
                        <br>
                        <h3>CATEGORIAS</h3>
                        <br>
                        <?php
                        
                        $categorias = explode(", ", $fila['categorias']);
                        foreach ($categorias as $categoria) {
                            echo "<p>" . $categoria . "</p>";
                        }
                       
                        
                        ?>
                        <br>
                        <h3>REQUISITOS</h3>
                        <br>
                        <?php
                        echo '<p>' . $fila['requisitos'] . '</p>';
                        ?>
                    </div>
                </div>

                <main>
                <?php

if (isset($_SESSION['nombreUsuario'])) {
    // Realiza la conexión a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Obtén el ID del juego
    $id_juego = $_GET['id'];

    // Obtén el ID del usuario
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $consulta_id_usuario = "SELECT id FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultado_id_usuario = mysqli_query($conexion, $consulta_id_usuario);
    $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
    $id_usuario = $fila_id_usuario['id'];

    // Verifica si el juego ya está en la lista de deseos del usuario
    $consulta_verificar_carrito = "SELECT * FROM carrito WHERE id_usuario = $id_usuario AND id_producto = $id_juego";
    $resultado_verificar_carrito = mysqli_query($conexion, $consulta_verificar_carrito);

    if (mysqli_num_rows($resultado_verificar_carrito) > 0) {
        // Si el juego ya está en el carrito, muestra un mensaje al usuario
        $enCarrito = true;
    } else {
        // Si el juego no está en el carrito, muestra el botón "Agregar al Carrito"
        $enCarrito = false;
    }
    

    $consulta_verificar_deseo = "SELECT * FROM deseados WHERE id_usuario = $id_usuario AND id_juego = $id_juego";
    $resultado_verificar_deseo = mysqli_query($conexion, $consulta_verificar_deseo);

    // Si el juego está en la lista de deseos, muestra el botón para eliminarlo de la lista
    if (mysqli_num_rows($resultado_verificar_deseo) > 0) {
        echo '<form action="eliminar_deseo.php" method="post">';
        echo '<input type="hidden" name="id_juego" value="' . $id_juego . '">';
        echo '<button type="submit" name="eliminar_deseo">Eliminar de la lista de deseos</button>';
        echo '</form>';
    } else {
        // Si el juego no está en la lista de deseos, muestra el botón para agregarlo a la lista
        echo '<form action="agregar_deseo.php" method="post">';
        echo '<input type="hidden" name="id_juego" value="' . $id_juego . '">';
        echo '<button class="Btn BookmarkBtn" type="submit" name="agregar_deseo"><span class="IconContainer">
        <svg viewBox="0 0 384 512" height="0.9em" class="icon">
          <path
            d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
          ></path>
        </svg>
      </span>
      <p class="Text">Deseados</p></button>';
        echo '</form>';
    }


    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Debes iniciar sesión para agregar juegos a tu lista de deseos.";
}
$cantidad = $fila['cantidad']
?>

                    <section id="home", class="main-content">

                    <?php if ($cantidad > 0): ?>
                    <a href="compra.php?id=<?php echo $id_juego; ?>">
                    <button class="compra" data-text="Awesome">
                    
                    <span class="actual-text">&nbsp;¡COMPRALO!&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;¡COMPRALO!&nbsp;</span></button></a>
                    <br><br><br>

                        <?php if ($loggedIn): ?>
                            <?php if ($enCarrito): ?>
                                <a href="carrito.php" style="text-decoration: none; color: yellow;"> El juego ya se encuentra en tu carrito </a>
                            <?php else: ?>
                                <form action="agregar_carrito.php" method="post">
                                    <br>
                                    <br>    
                                    <input type="hidden" name="id_juego" value="<?php echo $id_juego; ?>">
                                    <center>
                                      <button class="Btn CartBtn" type="submit" name="agregar_carrito">
                                        <span class="IconContainer">
                                          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(17, 17, 17)" class="iconcompra">
                                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path>
                                          </svg>
                                        </span>
                                        <p class="Text">Agregar al Carrito</p>
                                      </button>
                                    </center>

                                </form>
                            <?php endif; ?>
                        <?php else: ?>
                            <p>Debes iniciar sesión para agregar juegos a tu carrito.</p>
                        <?php endif; ?>
                        <br><br><br>
<?php else: ?>
<p style="color: red; font-size: 80px">Agotado</p>
<?php endif; ?>
                        <?php

                        echo '<p style="color: green; text-align: center; font-size: 24px;">Precio: $' . $fila['precio'] . " COP".'</p>';
                        ?>
                        <br><br>

                        <!-- Mostrar promedio de calificaciones -->
                        <?php
                        echo "<p>Promedio de calificaciones: " . round($promedio_calificaciones, 2) . "</p>";
                        ?>

                        <!-- Formulario para calificar y dejar un comentario -->
                        <?php if ($loggedIn): ?>
                            <div class="calificacion-comentario-form">
                                <h3>Califica y comenta sobre este juego</h3>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id_juego"; ?>" method="post">
                                    <label for="calificacion">Calificación:</label>
                                    <select name="calificacion" id="calificacion">
                                        <option value="1">1 estrella</option>
                                        <option value="2">2 estrellas</option>
                                        <option value="3">3 estrellas</option>
                                        <option value="4">4 estrellas</option>
                                        <option value="5">5 estrellas</option>
                                    </select>
                                    <br>
                                    <label for="comentario">Comentario:</label>
                                    <textarea name="comentario" id="comentario" rows="4" cols="50"></textarea>
                                    <br>
                                    <!-- Dentro del formulario HTML -->
                                    <input type="hidden" name="id_juego" value="<?php echo $id_juego; ?>">

                                    <input type="submit" value="Enviar calificación y comentario">

                                </form>
                            </div>
                        <?php endif; ?>
                        <?php
                        if ($resultado_comentarios) {
                            echo '<div class="comentarios">';
                            echo '<h3>Comentarios:</h3>';
                            echo '<ul>';
                            while ($fila_comentario = mysqli_fetch_assoc($resultado_comentarios)) {
                                echo '<li>';
                                echo '<div class="usuario">';
                                echo '<img src="' . $fila_comentario['imagenPerfil'] . '" alt="Avatar">';
                                if ($fila_comentario['id_usuario'] == $id_usuario) {
                                    echo '<span>Yo</span>';
                                } else {
                                    echo '<span>' . $fila_comentario['nombre_usuario'] . '</span>';
                                }
                                echo '</div>';
                                echo '<div class="contenido-comentario">';
                                echo '<p>Calificación: ' . $fila_comentario['calificacion'] . '/5</p>';
                                echo '<p>' . $fila_comentario['comentario'] . '</p>';
                                echo '<p>Fecha: ' . $fila_comentario['fecha'] . '</p>';
                                echo '</div>';
                                echo '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        } else {
                            echo "Error al obtener los comentarios: " . mysqli_error($conexion);
                        }
                        ?>

                    </section>
                </main>

                <footer class="main-content">
                    <ul>
                        <li><a href="#privacy">Política de Privacidad</a></li>
                        <li><a href="#terms">Términos de Uso</a></li>
                        <li><a href="#contact">Contacto</a></li>
                    </ul>
                </footer>
                </body>
                </html>
                <?php
            } else {
                echo '<p>No se proporcionó un ID de juego válido.</p>';
            }
        }
    } else {
        echo "Error al obtener la ID del usuario.";
    }
} else {
   
    header("Location: login.php");
    exit(); 
}
?>
<style>
/* Estilos para los botones */
.Btn {
  width: 140px;
  height: 40px;
  border-radius: 12px;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition-duration: .5s;
  overflow: hidden;
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.103);
  position: relative;
}

/* Estilos para el icono */
.IconContainer {
  position: absolute;
  left: -50px;
  width: 30px;
  height: 30px;
  background-color: transparent;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  z-index: 2;
  transition-duration: .5s;
}

/* Estilos para el texto */
.Text {
  height: 100%;
  width: fit-content;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1;
  transition-duration: .5s;
  font-size: 1.04em;
}

/* Estilos específicos para el botón de marcador */
.BookmarkBtn {
  background-color: rgb(12, 12, 12);
}

.BookmarkBtn .IconContainer {
  background: linear-gradient(to bottom, rgb(255, 136, 255), rgb(172, 70, 255));
  transition-duration: 0.3s;
}

.BookmarkBtn:hover .IconContainer {
  transform: translateX(58px);
  border-radius: 40px;
}

.BookmarkBtn:hover .Text {
  transform: translate(10px, 0px);
  color: white;
  transition-duration: .5s;
}

.CartBtn {
  background-color: rgb(12, 12, 12);
}

.CartBtn .IconContainer {
  background: linear-gradient(to bottom, rgb(255, 136, 255), rgb(172, 70, 255));
  transition-duration: 0.5s;
}

.CartBtn:hover .IconContainer {
  transform: translateX(58px);
  border-radius: 40px;
}

.CartBtn:hover .Text {
  transform: translate(10px, 0px);
  color: rgb(17, 17, 17);
  transition-duration: .5s;
}

/* Estilos para el estado activo */
.Btn:active {
  transform: scale(0.95);
  transition-duration: .5s;
}

/*comprar*/
/* === removing default button style ===*/
.compra {
  margin: 0;
  height: auto;
  background: transparent;
  padding: 0;
  border: none;
  cursor: pointer;
}

/* button styling */
.compra {
  --border-right: 6px;
  --text-stroke-color: rgba(255,255,255,0.6);
  --animation-color:  rgb(172, 70, 255);
  --fs-size: 2em;
  letter-spacing: 3px;
  text-decoration: none;
  font-size: var(--fs-size);
  font-family: "Arial";
  position: relative;
  text-transform: uppercase;
  color: transparent;
  -webkit-text-stroke: 1px var(--text-stroke-color);
}
/* this is the text, when you hover on button */
.hover-text {
  position: absolute;
  box-sizing: border-box;
  content: attr(data-text);
  color: var(--animation-color);
  width: 0%;
  inset: 0;
  border-right: var(--border-right) solid var(--animation-color);
  overflow: hidden;
  transition: 0.5s;
  -webkit-text-stroke: 1px var(--animation-color);
}
/* hover */
.compra:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 23px var(--animation-color))
}
</style>