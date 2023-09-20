<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylegameverse.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>inicio</title>
</head>
<body>

        
    <header class="main-header"></header>



        <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i>
            <span class="icon">
                <svg viewBox="0 0 175 80" width="60" height="40">
                    <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                </svg>
            </span>
            <span class="text">MENU </span></label>
        <input type="checkbox" id="btn-nav"> 
            
        <nav>
          <ul class="navigation">
            <li><a href="./GAMEVERSE.php">HOME</a></li>
            <li><a href="./tienda.html">TIENDA</a></li>
            <li><a href="./Fandom.html">FANDOM</a></li>
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

    <a href="./usuario.php">
    <button class="btn" type="button">
 <strong>
  <?php
  session_start();
if (isset($_COOKIE['nombreUsuario'])) {
    $nombreUsuario = $_COOKIE['nombreUsuario'];
    echo "Bienvenido, $nombreUsuario";
} else {
    echo "Bienvenido, invitado";
}
?>

  </strong>
 
  <div id="container-stars">
    <div id="stars"></div>
  </div>

  <div id="glow">
    <div class="circle"></div>
    <div class="circle"></div>
  </div>
</button>
</a>
<style>
  .btn {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 13rem;
  overflow: hidden;
  height: 3rem;
  background-size: 300% 300%;
  backdrop-filter: blur(1rem);
  border-radius: 5rem;
  transition: 0.5s;
  animation: gradient_301 5s ease infinite;
  border: double 4px transparent;
  background-image: linear-gradient(#212121, #212121),  linear-gradient(137.48deg, #ffdb3b 10%,#FE53BB 45%, #8F51EA 67%, #0044ff 87%);
  background-origin: border-box;
  background-clip: content-box, border-box;
  float: right;
}

#container-stars {
  position: absolute;
  z-index: -1;
  width: 100%;
  height: 100%;
  overflow: hidden;
  transition: 0.5s;
  backdrop-filter: blur(1rem);
  border-radius: 5rem;
}

strong {
  z-index: 2;
  font-family: 'Avalors Personal Use';
  font-size: 12px;
  letter-spacing: 5px;
  color: #FFFFFF;
  text-shadow: 0 0 4px white;
}

#glow {
  position: absolute;
  display: flex;
  width: 12rem;
}

.circle {
  width: 100%;
  height: 30px;
  filter: blur(2rem);
  animation: pulse_3011 4s infinite;
  z-index: -1;
}

.circle:nth-of-type(1) {
  background: rgba(254, 83, 186, 0.636);
}

.circle:nth-of-type(2) {
  background: rgba(142, 81, 234, 0.704);
}

.btn:hover #container-stars {
  z-index: 1;
  background-color: #212121;
}

.btn:hover {
  transform: scale(1.1)
}

.btn:active {
  border: double 4px #FE53BB;
  background-origin: border-box;
  background-clip: content-box, border-box;
  animation: none;
}

.btn:active .circle {
  background: #FE53BB;
}

#stars {
  position: relative;
  background: transparent;
  width: 200rem;
  height: 200rem;
}

#stars::after {
  content: "";
  position: absolute;
  top: -10rem;
  left: -100rem;
  width: 100%;
  height: 100%;
  animation: animStarRotate 90s linear infinite;
}

#stars::after {
  background-image: radial-gradient(#ffffff 1px, transparent 1%);
  background-size: 50px 50px;
}

#stars::before {
  content: "";
  position: absolute;
  top: 0;
  left: -50%;
  width: 170%;
  height: 500%;
  animation: animStar 60s linear infinite;
}

#stars::before {
  background-image: radial-gradient(#ffffff 1px, transparent 1%);
  background-size: 50px 50px;
  opacity: 0.5;
}

@keyframes animStar {
  from {
    transform: translateY(0);
  }

  to {
    transform: translateY(-135rem);
  }
}

@keyframes animStarRotate {
  from {
    transform: rotate(360deg);
  }

  to {
    transform: rotate(0);
  }
}

@keyframes gradient_301 {
  0% {
    background-position: 0% 50%;
  }

  50% {
    background-position: 100% 50%;
  }

  100% {
    background-position: 0% 50%;
  }
}

@keyframes pulse_3011 {
  0% {
    transform: scale(0.75);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
  }

  70% {
    transform: scale(1);
    box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
  }

  100% {
    transform: scale(0.75);
    box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
  }
}
</style>
    


<center>
    <video src="./vid/y2mate.com - Marvels SpiderMan 2  Limited Edition PS5 Bundle  DualSense Wireless Controller_720p.mp4" width="600px"controls autoplay loop="1"></video> 
</center>
<br>
<br>
<br>

<div class="wrapper">
    <div class="cards">


        <h2><strong>QUE ES LO NUEVO</strong></h2>

	<div class="news">

		<figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/spider.jpg" />

			<figcaption>

				<h3>EL PRÓXIMO JUEGO Marvel Spiderman 2</h3>

				<p>

					
Los Spider-Men Peter Parker y Miles Morales regresan para una nueva y emocionante aventura de la aclamada franquicia.

Balancéate, salta para recorrer toda la ciudad También podrás cambiar rápidamente entre Peter Parker y Miles Morales para vivir diferentes historias y canalizar poderes nuevos y épicos, se testigo el 20/OCT/2023

				</p>

			</figcaption>

		</figure>
        <figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/mario.jpg" />

			<figcaption>

				<h3>EL PRÓXIMO JUEGO Super Mario bros, Wonder</h3>

				<p>

					
Encuentra maravillas en la siguiente evolución de las aventuras de Mario,
El estilo de juego clásico de desplazamiento lateral de los juegos de Mario será toda una locura con la adición de la Flor Maravilla. Estos revolucionarios objetos activarán espectaculares momentos que tendrás que ver para creer. sé testigo de el 20/OCT/2023

				</p>

			</figcaption>

		</figure>
        <figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/Mortal-Kombat-1-f.jpg" />

			<figcaption>

				<h3>EL PROXIMO JUEGO Mortal Kombat 1</h3>

				<p>

					
Descubre un nuevo universo de Mortal Kombat creado por Liu Kang, Dios del Fuego. ¡Mortal Kombat 1 abre paso a una nueva era de esta icónica saga con un nuevo sistema de kombate, modos de juego y fatalities! Se testigo de el 19/AGO/2023

				</p>

			</figcaption>

		</figure>
        <figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/star.jpg" />

			<figcaption>

				<h3>EL NUEVO JUEGO STARFILD</h3>

				<p>

					
Starfield es el primer universo nuevo en más de 25 años que crea Bethesda Game Studios, los galardonados creadores de The Elder Scrolls V: Skyrim y Fallout 4. En este juego de rol de próxima generación ambientado entre las estrellas, podrás crear el personaje que desees y explorar con una libertad sin precedentes mientras te embarcas en un viaje épico para desentrañar el mayor misterio de la humanidad.

				</p>

			</figcaption>

		</figure>
        <figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/sonic.jpg" />

			<figcaption>

				<h3>EL PROXIMO JUEGO Sonic Superstar</h3>

				<p>

					
Recorre las místicas Northstar Islands en la renovación del clásico juego de plataformas 2D de acción a alta velocidad de Sonic. Juega como Sonic, Tails, Knuckles y Amy por lugares inéditos en solitario o con otros 3 jugadores y evita que el Dr. Eggman, Fang y un nuevo rival misterioso conviertan a los animales gigantes, antes de que sea muy tarde el 17/OCT/2023


				</p>

			</figcaption>

		</figure>
        <figure class="article" style="box-shadow: 0 0 80px red;">

			<img src="./img/Noticias/Silksong_cover.jpg" />

			<figcaption>

				<h3>PARA CUANDO saldra silksong?? </h3>

				<p>

					
No cabe duda de que Hollow Knight es uno de los juegos de tipo metroidvania que más furor ha causado; con un enorme mapa, enemigos, opciones y diversión a raudales, todos estamos pendientes de que Team Cherry anuncie por fin la fecha definitiva de lanzamiento de su secuela, Hollow Knight: Silksong, pero el tiempo pasa y todavía no tenemos noticias claras al respecto a pesar de que prometieron que saldría a la venta este mismo año 2023.

				</p>

			</figcaption>

		</figure>
        
</div>

<br>

<center>



<h1 class="titulo">
    contactanos 
</h1>
</center>

<center>
        <button class="btn" style="box-shadow: 0 0 80px red; text-decoration: none;"> cel:31468584
        </button>
        <button class="btn" style="box-shadow: 0 0 80px red;text-decoration: none;"> tel:13498647
        </button>
    
        <a href="https://www.google.com/maps/place/Parque+San+Antonio/@6.2455975,-75.5708185,16.25z/data=!4m15!1m8!3m7!1s0x8e4428dfb80fad05:0x42137cfcc7b53b56!2sMedell%C3%ADn,+Antioquia!3b1!8m2!3d6.2476376!4d-75.5658153!16zL20vMDF4XzZz!3m5!1s0x8e44285682622b25:0x549026acddaebe34!8m2!3d6.245725!4d-75.5681414!16s%2Fg%2F121rjknb?entry=ttu"><button class="btn" style="box-shadow: 0 0 80px red; text-decoration: none;"> ubicanos</a></button>
        
    <button class="btn" style="box-shadow: 0 0 80px red; text-decoration: none;"> correo
    </button>
    
</center>



<br>
<br>
<center>
    <footer class="footer">
        <p>&copy; 2023 Todos los derechos reservados.</p>
    </footer>
</center>



</style>
</body>
</html>