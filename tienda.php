<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Juegos</title>
</head>
<body>
    <header>
        <h1>Tienda de Juegos</h1>
    </header>

    <main>
        <section id="catalogo">
            <div class="juegos-container">
                <?php
                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }

                $consulta = "SELECT id, nombre, descripcion, requisitos, precio, imagen FROM productos";
                $resultado = mysqli_query($conexion, $consulta);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link">';
                        echo '<div class="juego">';
                        echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '">';
                        echo '<h2>' . $fila['nombre'] . '</h2>';
                        echo '<p>Precio: $' . $fila['precio'] . '</p>';
                        echo '</div>';
                        echo '</a>';
                    }
                } else {
                    echo '<p>No hay productos disponibles.</p>';
                }

                mysqli_close($conexion);
                ?>
            </div>
        </section>
    </main>

    <footer>
       
    </footer>
</body>
</html>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

main {
    padding: 20px;
}

.juegos-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; 
}

.juego {
    border: 1px solid #ccc;
    padding: 10px;
    width: calc(33.33% - 20px); 
    box-sizing: border-box;
}

.juego img {
    max-width: 100%;
    height: auto;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}
</style>
</style>
