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
    <span class="text">MENU</span></label>
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
<center>
<h1 class="titulo">
JUEGOS
</h1>
</center>
<div class="wrapper">
    <main>
        <section id="catalogo">
        <div class="cards">
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
            echo '<figure class="card">';
            echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '">';
            echo '<figcaption>';
            echo '<h2>' . $fila['nombre'] . '</h2>';
            echo '<p>Precio: $' . $fila['precio'] . '</p>';
            echo '</figcaption>';
            echo '</figure>';
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


    <footer class="footer">
        <p>&copy; 2023 Todos los derechos reservados.</p>
    </footer>
</div>
</body>
</html>


