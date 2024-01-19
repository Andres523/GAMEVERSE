<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Juego</title>
</head>
<body>
    <header>
        <h1>Detalles del Juego</h1>
    </header>

    <main>
        <section id="detalles-juego">
            <?php
            if (isset($_GET['id'])) {
                $id_juego = $_GET['id'];

                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, c.id as categoria_id, c.nombre as categoria_nombre
                             FROM productos p
                             LEFT JOIN categorias c ON p.categoria = c.id
                             WHERE p.id = $id_juego";
                
                $resultado = mysqli_query($conexion, $consulta);

                if (mysqli_num_rows($resultado) > 0) {
                    $fila = mysqli_fetch_assoc($resultado);

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

    <footer>
      
    </footer>
</body>
</html>
