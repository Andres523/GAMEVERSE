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
    <center>
        <h1 class="titulo">JUEGOS</h1>
    </center>
    <form class="search-form">
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
                echo '<input type="checkbox" name="categorias[]" value="' . $fila_categoria['id'] . '" onchange="filtrarJuegos()">';
                echo $fila_categoria['nombre'];
                echo '</label>';
            }

            mysqli_close($conexion);
        ?>
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

                        $filtro_nombre = isset($_GET['search']) ? mysqli_real_escape_string($conexion, $_GET['search']) : '';
                        $filtro_categorias = isset($_GET['categorias']) ? $_GET['categorias'] : array();

                        $consulta = "SELECT id, nombre, descripcion, requisitos, precio, imagen, cantidad, categoria FROM productos WHERE 1";

                        if (!empty($filtro_nombre)) {
                            $consulta .= " AND nombre LIKE '%$filtro_nombre%'";
                        }

                        if (!empty($filtro_categorias)) {
                            $condiciones_categorias = array();
                    
                            foreach ($filtro_categorias as $categoria) {
                                $condiciones_categorias[] = "FIND_IN_SET('$categoria', categoria) > 0";
                            }
                            
                            $consulta .= " AND (" . implode(' OR ', $condiciones_categorias) . " OR categoria IS NULL)";
                        }

                        $resultado = mysqli_query($conexion, $consulta);

                        if ($resultado) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link">';
                                echo '<figure class="card">';
                                echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" style="width: 100%; min-height: 100%; object-fit: cover;">';
                                echo '<figcaption>';
                                echo '<h2 style="text-decoration: none;">' . $fila['nombre'] . '</h2>';
                                
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
        var searchInput = document.getElementById("search");
        var checkboxes = document.querySelectorAll('input[name="categorias[]"]');

        searchInput.addEventListener("input", function () {
            filtrarJuegos();
        });

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                filtrarJuegos();
            });
        });

        function filtrarJuegos() {
            var filtroNombre = searchInput.value.toUpperCase();
            var filtroCategorias = obtenerCategoriasSeleccionadas();

            var cards = document.getElementsByClassName("juego-link");

            for (var i = 0; i < cards.length; i++) {
                var card = cards[i];
                var titulo = card.getElementsByTagName("h2")[0];
                var txtValue = titulo.textContent || titulo.innerText;

                if (
                    (txtValue.toUpperCase().indexOf(filtroNombre) > -1 || filtroNombre === "") &&
                    cumpleFiltrosCategorias(card, filtroCategorias)
                ) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            }
        }

        function cumpleFiltrosCategorias(card, filtroCategorias) {
            if (filtroCategorias.length === 0) {
                return true;
            }

            var categoriasProducto = card.getAttribute("data-categorias").split(',').map(id => id.trim());

            for (var i = 0; i < filtroCategorias.length; i++) {
                var categoria = filtroCategorias[i];

                if (categoriasProducto.includes(categoria)) {
                    return true;
                }
            }

            return false;
        }

        function obtenerCategoriasSeleccionadas() {
            var categoriasSeleccionadas = [];
            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    categoriasSeleccionadas.push(checkbox.value);
                }
            });
            return categoriasSeleccionadas;
        }
    </script>
</body>
</html>