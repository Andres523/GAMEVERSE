<?php
session_start();

if (!isset($_SESSION['nombreUsuario'])) {
    header("Location: index.php");
    exit();
}
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

$nombreUsuario = $_SESSION['nombreUsuario'];

$consultaDatos = "SELECT color, fondo FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

if ($resultadoDatos && $fila = mysqli_fetch_assoc($resultadoDatos)) {
  $colorFondo = $fila['color'];
  $fondo =  $fila['fondo'];
} else {
 
  $fondo = 'linear-gradient(#141e30, #243b55)';
  $colorFondo = '#fcf9f4';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Services Section</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
 
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    
    
  </head>
  <body id="bodyBackground" style="background-color: <?php echo $colorFondo; ?>; background-image: url('<?php echo $fondo; ?>'); background-repeat: no-repeat; background-size: cover; background-position: center top;background-attachment: fixed;">
    <section>
    <a class="btn4" href="index.php">Volver</a>
      <div class="row">
        <h2 class="section-heading">¿Que quieres Hacer hoy?</h2>
      </div>

      <div class="row">
        <a href="usuarios.php" style="color: inherit; text-decoration: none;">
        <div class="column">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-person"></i>
            </div>
            <h3>USUARIOS</h3>
            <p>
              Revisar que usuarios Estan en la plataforma, Editarlos o eliminarlos.
            </p>
          </div>
          </a>
        </div>

        
        <div class="column">
        <a href="juegos.php" style="color: inherit; text-decoration: none;">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-gamepad"></i>
            </div>
            <h3>JUEGOS</h3>
            <p>
              Agregar, editar y eliminar juegos de tu catalogo.
            </p>
          </div>
          </a>
        </div>
        
        
        <div class="column">
          <a href="mark.php" style="color: inherit; text-decoration: none;">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-dragon"></i>
            </div>
            <h3>PRODUCTOS MARKETPLACE</h3>
            <p>
              Agregar, editar o eliminar productos, comics, figuras de tu catalogo.
            </p>
          </div>
          </a>
        </div>

        <div class="column">
        <a href="ventas.php" style="color: inherit; text-decoration: none;">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-truck"></i>
            </div>
            <h3>VENTAS</h3>
            <p>
              Revision de las ventas y el envio de productos.
            </p>
          </div>
          </a>
        </div>
      

      <div class="column">

        <a href="novedades.php" style="color: inherit; text-decoration: none;">
          <div class="card">
            <div class="icon-wrapper">
            <i class="fa-solid fa-headset"></i>
            </div>
            <h3>Novedades</h3>
            <p>
             agrega novedades nuevas y elimina las viejas 
            </p>
          </div>
          </a>
        </div>
        </div>
    </section>
  </body>
</html>


<style>
    * {
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
section {
  height: 100vh;
  width: 100%;
  display: grid;
  place-items: center;
}
.row {
  display: flex;
  flex-wrap: wrap;
}
.column {
  width: 100%;
  padding: 0 1em 1em 1em;
  text-align: center;
}
.card {
  width: 100%;
  height: 100%;
  padding: 2em 1.5em;
  background: linear-gradient(#ffffff 50%, #2c7bfe 50%);
  background-size: 100% 200%;
  background-position: 0 2.5%;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
}
h3 {
  font-size: 20px;
  font-weight: 600;
  color: black;
  margin: 1em 0;
}
p {
  color: #8803f4;
  font-size: 15px;
  line-height: 1.6;
  letter-spacing: 0.03em;
}
.icon-wrapper {
  background-color: #8803f4;
  position: relative;
  margin: auto;
  font-size: 30px;
  height: 2.5em;
  width: 2.5em;
  color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  transition: 0.5s;
}
.card:hover {
  background-position: 0 100%;
}
.card:hover .icon-wrapper {
  background-color: #ffffff;
  color: #141e30;
}
.card:hover h3 {
  color: #ffffff;
}
.card:hover p {
  color: #243b55;
}
@media screen and (min-width: 768px) {
  section {
    padding: 0 2em;
  }
  .column {
    flex: 0 50%;
    max-width: 50%;
  }
}
@media screen and (min-width: 992px) {
  section {
    padding: 1em 3em;
  }
  .column {
    flex: 0 0 33.33%;
    max-width: 33.33%;
  }
}
</style>

<style>
main {
    max-width: 800px;
    height: 600px;
    margin: 30px auto;
    background: #2d2f33;
    padding: 30px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
}	

    main {
        max-width: 800px;
        height: 600px;
        margin: 30px auto;
        background: #2d2f33;
        padding: 30px;
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    }

    .tab table {
        width: 100%;
        border-collapse: collapse;
    }

    .tab td {
        padding: 10px; 
    }

    .tab tr {
        height: 10px; 
    }




/* mari */

.btn4 {
    --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
    --border-width: .125em;
    --curve-size: .5em;
    --blur: 30px;
    --bg: #080312;
    --color: #afffff;
    color: var(--color);
    position: relative;
    isolation: isolate;
    display: inline-grid;
    place-content: center;
    padding: .5em 1.5em;
    font-size: 17px;
    border: 0;
    text-transform: uppercase;
    box-shadow: 10px 10px 20px rgba(0, 0, 0, .6);
    clip-path: polygon(
              /* Top-left */
              0% var(--curve-size), 
              var(--curve-size) 0,
              /* top-right */
              100% 0,
              100% calc(100% - var(--curve-size)),  
              /* bottom-right 1 */
              calc(100% - var(--curve-size)) 100%,
              /* bottom-right 2 */
              0 100%);
    transition: color 250ms;
}
      
.btn4::after,
.btn4::before {
    content: '';
    position: absolute;
    inset: 0;
}
      
.btn4::before {
    background: var(--border-color);
    background-size: 300% 300%;
    animation: move-bg7234 5s ease infinite;
    z-index: -2;
}
      
@keyframes move-bg7234 {
    0% {
      background-position: 31% 0%
    }

    50% {
      background-position: 70% 100%
    }

    100% {
      background-position: 31% 0%
    }
}
 
.btn4::after {
    background: var(--bg);
    z-index: -1;
    clip-path: polygon(
              /* Top-left */
              var(--border-width) 
              calc(var(--curve-size) + var(--border-width) * .5),

              calc(var(--curve-size) + var(--border-width) * .5) var(--border-width),

              /* top-right */
              calc(100% - var(--border-width)) 
              var(--border-width),

              calc(100% - var(--border-width)) 
              calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),

              /* bottom-right 1 */
              calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) calc(100% - var(--border-width)),
              /* bottom-right 2 */
              var(--border-width) calc(100% - var(--border-width)));
    transition: clip-path 500ms;
}
      
.btn4:where(:hover, :focus)::after {
    clip-path: polygon(
                  /* Top-left */
                  calc(100% - var(--border-width)) 

                  calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
      
                  calc(100% - var(--border-width))

                  var(--border-width),
      
                  /* top-right */
                  calc(100% - var(--border-width))

                   var(--border-width),
      
                  calc(100% - var(--border-width)) 

                  calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
      
                  /* bottom-right 1 */
                  calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) 
                  calc(100% - var(--border-width)),

                  /* bottom-right 2 */
                  calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5))
                  calc(100% - var(--border-width)));
    transition: 200ms;
}
      
.btn4:where(:hover, :focus) {
    color: #fff;
}
</style>