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
    <link rel="stylesheet" href="./styles/tienda2.css">
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
                <li><a href="./marketplace.php">MARKETPLACE</a></li>
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

    <?php





$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

// Verificar la conexión
if ($conexion === false) {
    die("Error: No se pudo conectar. " . mysqli_connect_error());
}
error_reporting(0);
$nombreUsuario = $_SESSION['nombreUsuario'];



// Consulta para obtener el ID del usuario
$sql = "SELECT id FROM usuarios WHERE nombre = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $nombreUsuario); 
$stmt->execute();
$stmt->bind_result($idUsuario);
$stmt->fetch();
$stmt->close();

// Consulta para obtener la cantidad de carritos del usuario
$sql = "SELECT COUNT(*) AS cantidad_carritos FROM carrito WHERE id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idUsuario); 
$stmt->execute();
$stmt->bind_result($cantidad_carritos);
$stmt->fetch();
$stmt->close();



mysqli_close($conexion); // Cerrar la conexión
?>
<a href="carrito.php"><button data-quantity="<?php echo $cantidad_carritos; ?>" class="btn-cart">
    <svg class="icon-cart" viewBox="0 0 24.38 30.52" height="30.52" width="24.38" xmlns="http://www.w3.org/2000/svg">
        <title>icon-cart</title>
        <path transform="translate(-3.62 -0.85)" d="M28,27.3,26.24,7.51a.75.75,0,0,0-.76-.69h-3.7a6,6,0,0,0-12,0H6.13a.76.76,0,0,0-.76.69L3.62,27.3v.07a4.29,4.29,0,0,0,4.52,4H23.48a4.29,4.29,0,0,0,4.52-4ZM15.81,2.37a4.47,4.47,0,0,1,4.46,4.45H11.35a4.47,4.47,0,0,1,4.46-4.45Zm7.67,27.48H8.13a2.79,2.79,0,0,1-3-2.45L6.83,8.34h3V11a.76.76,0,0,0,1.52,0V8.34h8.92V11a.76.76,0,0,0,1.52,0V8.34h3L26.48,27.4a2.79,2.79,0,0,1-3,2.44Zm0,0"></path>
    </svg>
    
</button></a>
<style>
    .btn-cart {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  border-radius: 10px;
  border: none;
  background-color: transparent;
  position: relative;
}

.btn-cart::after {
  content: attr(data-quantity);
  width: fit-content;
  height: fit-content;
  position: absolute;
  font-size: 15px;
  color: white;
  font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  opacity: 0;
  visibility: hidden;
  transition: .2s linear;
  top: 115%;
}

.icon-cart {
  width: 24.38px;
  height: 30.52px;
  transition: .2s linear;
}

.icon-cart path {
  fill: rgb(240, 8, 8);
  transition: .2s linear;
}

.btn-cart:hover > .icon-cart {
  transform: scale(1.2);
}

.btn-cart:hover > .icon-cart path {
  fill: rgb(186, 34, 233);
}

.btn-cart:hover::after {
  visibility: visible;
  opacity: 1;
  top: 105%;
}

.quantity {
  display: none;
}

</style>
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
