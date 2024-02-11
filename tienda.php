<?php
session_start();
$loggedIn = isset($_SESSION['nombreUsuario']);

function imprimirEstrellas($calificacion) {
    if ($calificacion === null) {
        return 'Sin calificación'; 
    }

    $estrellas = '';
    $calificacion = round($calificacion); // Redondear la calificación

    
    for ($i = 0; $i < 5; $i++) {
        if ($i < $calificacion) {
            $estrellas .= '<span style="color: gold;">★</span>'; // Estrella llena
        } else {
            $estrellas .= '<span style="color: grey;">★</span>'; // Estrella vacía
        }
    }
    return $estrellas;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/tienda.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>Tienda de Juegos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body>

    <header class="main-header">
        <label for="btn-nav" class="btn-nav">
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
            <ul style="font-family:sans-serif" class="navigation">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="tienda.php">TIENDA</a></li>
                <li><a href="./marketplace.html">MARKETPLACE</a></li>
            </ul>
            <aside>
                <a href="https://www.facebook.com/"><img src="./img/facebook-logo-3-1.png" alt="facebook-logo-3-1" width="50px"></a>
                <a href="https://twitter.com/"><img src="./img/Logo_of_Twitter.svg.png" alt="Logo_of_Twitter" width="70px"></a>
                <a href="https://www.instagram.com/?hl=en"><img src="./img/Instagram-Logosu.png" alt="Instagram-Logosu" width="80px"></a>
            </aside>
        </nav>
    </header>

    <center>
        <h1 class="titulo">JUEGOS</h1>
    </center>

    <form id="filter-form">
        <div class="search-box">
            <a class="search-btn">
                <i class="fas fa-search"></i>
            </a>
            <input type="text" class="search-input" id="search" name="search" placeholder="Nombre del juego">
        </div>
        <br>
        <div class="button-container">
            <div class="button" id="settingsBtn">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none" class="svg-icon">
                        <g stroke-width="1.5" stroke="#5d41de"></g>
                    </svg>
                </span>
                <span class="label">Categorías</span>
                <div class="settings-popup" id="settingsPopup">
                    <?php
                    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                    if (!$conexion) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }

                    $consulta_categorias = "SELECT id, nombre FROM categorias";
                    $resultado_categorias = mysqli_query($conexion, $consulta_categorias);

                    while ($fila_categoria = mysqli_fetch_assoc($resultado_categorias)) {
                        echo '<label class="categoria-label">';
                        echo '<input type="checkbox" name="categorias[]" value="' . $fila_categoria['id'] . '" class="categoria-checkbox">';
                        echo '<span class="categoria-text">' . $fila_categoria['nombre'] . '</span>';
                        echo '</label>';
                    }

                    mysqli_close($conexion);
                    ?>
                    <br>
                    <button style="color: aliceblue" type="submit" class="button2">Filtrar por Categoría</button>
                    <br>
                </div>
            </div>
        </div>
    </form>

    <center class="d-flex justify-content-center">
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
                                echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link" style="color: inherit; text-decoration: none;">';
                                echo '<figure class="card">';
                                echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" style="width: 100%; min-height: 100%; object-fit: cover;">';
                                echo '<figcaption>';
                                echo '<h2 style="text-decoration: none;">' . $fila['nombre'] . '</h2>';
                                echo '<p>' . imprimirEstrellas($fila['calificacion_promedio']) . '</p>';
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
        </div>
    </center>

    <footer class="footer">
        <p>&copy; 2023 Todos los derechos reservados.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('filter-form');
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                filtrarJuegos();
            });
            

            var searchInput = document.getElementById('search');
            searchInput.addEventListener('input', function () {
                filtrarJuegos();
            });
        });

        function filtrarJuegos() {
            var form = document.getElementById('filter-form');
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'procesar_filtro.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('cards-container').innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        }

        document.addEventListener("DOMContentLoaded", function () {
            var categoriesBtn = document.getElementById('categoriesBtn');
            var categoriesPopup = document.getElementById('categoriesPopup');

            categoriesBtn.addEventListener('click', function () {
                toggleCategoriesPopup();
            });

            function toggleCategoriesPopup() {
                if (categoriesPopup.style.display === 'block') {
                    categoriesPopup.style.display = 'none';
                } else {
                    categoriesPopup.style.display = 'block';
                }
            }

            // Cerrar el menú si se hace clic fuera de él
            document.addEventListener('click', function (event) {
                var isClickInside = categoriesBtn.contains(event.target) || categoriesPopup.contains(event.target);
                if (!isClickInside) {
                    categoriesPopup.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
