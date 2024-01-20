<?php
            if (isset($_GET['id'])) {
                $id_juego = $_GET['id'];

                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, c.id as categoria_id, c.nombre as categoria_nombre
                FROM productos p
                LEFT JOIN categorias c ON p.categoria = c.id
                WHERE p.id = $id_juego";
   
                $resultado = mysqli_query($conexion, $consulta);
                if (mysqli_num_rows($resultado) > 0) {
                    $fila = mysqli_fetch_assoc($resultado);
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
    <header>
        <h1>Detalles del Juego</h1>
    </header>

    <div class="main-content">
            <center>
                <?php
                echo '<video width="1000px"controls autoplay loop="1" controls>';
                echo '<source src="' . $fila['video_mp4'] . '" type="video/mp4">';
                echo '</video>';
                ?>
                
            </center>

    </div>

    <main>
        <section id="detalles-juego">
            <?php  

                    echo '<div class="juego">';
                    echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '">';
                    echo '<h2>' . $fila['nombre'] . '</h2>';
                    echo '<p>Descripción: ' . $fila['descripcion'] . '</p>';
                    echo '<p>Requisitos: ' . $fila['requisitos'] . '</p>';
                    echo '<p>Precio: $' . $fila['precio'] . '</p>';
                    echo '<p>Categoría: <a href="categorias.php?id=' . $fila['categoria_id'] . '">' . $fila['categoria_nombre'] . '</a></p>';
                    echo '<button>Comprar</button>';
                    echo '</div>';
                } else {
                    echo '<p>No se encontró el juego.</p>';
                }

                mysqli_close($conexion);
            } else {
                echo '<p>No se proporcionó un ID de juego válido.</p>';
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
