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
            $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, c.id as categoria_id, c.nombre as categoria_nombre
            FROM productos p
            LEFT JOIN categorias c ON p.categoria = c.id
            WHERE p.id = $id_juego";

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
                            echo "¡Gracias por tu comentario!";
                            header("refresh:2;url=tienda.php");
                            exit();
                        } else {
                            echo "Error al actualizar la calificación: " . mysqli_error($conexion);
                        }
                    } else {
                        // Si el usuario no ha calificado el juego, insertar una nueva calificación
                        $insertar_calificacion = "INSERT INTO calificaciones (id_usuario, id_juego, calificacion, comentario, fecha) VALUES ($id_usuario, $id_juego, $calificacion, '$comentario', NOW())";
                        $resultado_insertar_calificacion = mysqli_query($conexion, $insertar_calificacion);
                        if ($resultado_insertar_calificacion) {
                            echo "¡Gracias por tu comentario!";
                            header("refresh:2;url=tienda.php");
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
                </head>
                <body>

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
                        <h3>REQUISITOS</h3>
                        <br>
                        <?php
                        echo '<p>' . $fila['requisitos'] . '</p>';
                        ?>
                    </div>
                </div>

                <main>
                    <section id="home", class="main-content">
                    <a href="compra.php?id=<?php echo $id_juego; ?>">Comprar juego</a>
                        <?php
                        

                        echo '<form action="carrito.php" method="post">';
                        echo '<input type="hidden" name="id_juego" value="' . $id_juego . '">';
                        echo '<button type="submit" name="agregar_carrito">Agregar al Carrito</button>';
                        echo '</form>';
                        echo '<p style="color: green; text-align: center; font-size: 24px;">Precio: $' . $fila['precio'] . " COP".'</p>';
                        ?>

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

                        <!-- Sección de comentarios -->
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
    // Si el usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header("Location: login.php");
    exit(); // Es importante detener la ejecución del script después de redirigir al usuario.
}
?>
