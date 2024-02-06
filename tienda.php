<?php
session_start();
$loggedIn = isset($_SESSION['nombreUsuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/tienda.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>Tienda de Juegos</title>
</head>
<body>
    <header class="main-header">
        <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i>
            <span class="icon">
                <svg viewBox="0 0 175 80" width="60" height="40">
                    <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                </svg>
            </span>
            <span class="text">MENU</span>
        </label>
        <input type="checkbox" id="btn-nav"> 
    
        <nav>
            <ul class="navigation">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="tienda.html">TIENDA</a></li>
                <li><a href="./marketplace.html">MARKETPLACE</a></li>
            </ul>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <aside>
                <a href="https://www.facebook.com/"><img src="./img/facebook-logo-3-1.png" alt="facebook-logo-3-1" width="50px"></a>
                <a href="https://twitter.com/"><img src="./img/Logo_of_Twitter.svg.png" alt="Logo_of_Twitter" width="70px"></a>
                <a href="https://www.instagram.com/?hl=en"><img src="./img/Instagram-Logosu.png" alt="Instagram-Logosu" width="80px"></a>
            </aside>
        </nav>
    </header>
    <div class="spinner-overlay">
        <div class="spinner"></div>
    </div>
    <center>
        <h1 class="titulo">JUEGOS</h1>
    </center>
    <form id="filter-form" class="search-form">
        <label for="search">Buscar juego:</label>
        <input type="text" id="search" name="search" placeholder="Nombre del juego">
        
        <label for="categorias">Filtrar por Categorías:</label>
        <?php
            $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }

            $consulta_categorias = "SELECT id, nombre FROM categorias";
            $resultado_categorias = mysqli_query($conexion, $consulta_categorias);

            while ($fila_categoria = mysqli_fetch_assoc($resultado_categorias)) {
                echo '<label>';
                echo '<input type="checkbox" name="categorias[]" value="' . $fila_categoria['id'] . '">';
                echo $fila_categoria['nombre'];
                echo '</label>';
            }

            mysqli_close($conexion);
        ?>
        <button type="submit">Filtrar por Categoría</button>
    </form>

    <div class="wrapper">
        <main>
            <section id="catalogo">
                <div class="cards" id="cards-container">
                    <?php
                        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                        if (!$conexion) {
                            die("Error de conexión: " . mysqli_connect_error());
                        }

                        $consulta = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.cantidad, p.categoria,
                        AVG(c.calificacion) AS calificacion_promedio
                        FROM productos p
                        LEFT JOIN calificaciones c ON p.id = c.id_juego
                        GROUP BY p.id";
                        $resultado = mysqli_query($conexion, $consulta);

                        if ($resultado) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link">';
                                echo '<figure class="card">';
                                echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" style="width: 100%; min-height: 100%; object-fit: cover;">';
                                echo '<figcaption>';
                                echo '<h2 style="text-decoration: none;">' . $fila['nombre'] . '</h2>';
                                echo '<p>' . round($fila['calificacion_promedio'], 1) . '</p>'; //calificacion no olvidemos las estrellas
                                
                                if ($fila['cantidad'] > 0) {
                                    echo '<p style="color: green;">Precio: $' . $fila['precio'] . '</p>';
                                } else {
                                    echo '<p style="color: red; text-align: center;">Agotado</p>';
                                }

                                echo '</figcaption>';
                                echo '</figure>';
                                echo '</a>';
                            }
                        } else {
                            echo "Error en la consulta: " . mysqli_error($conexion);
                        }

                        mysqli_close($conexion);
                    ?>
                </div>
            </section>
        </main>
        <footer class="footer">
            <p>&copy; 2023 Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('filter-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); 
                filtrarJuegos();
            });
        });

        function filtrarJuegos() {
            var form = document.getElementById('filter-form');
            var formData = new FormData(form); 
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'procesar_filtro.php', true); 
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('cards-container').innerHTML = xhr.responseText; 
                }
            };
            xhr.send(formData);
        }
    </script>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('filter-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); 
                filtrarJuegos();
            });

            var searchInput = document.getElementById('search');
            searchInput.addEventListener('input', function() {
                filtrarJuegos();
            });
        });

        function filtrarJuegos() {
            var form = document.getElementById('filter-form');
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'procesar_filtro.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('cards-container').innerHTML = xhr.responseText; 
                }
            };
            xhr.send(formData); 
        }
    </script>
</body>
</html>