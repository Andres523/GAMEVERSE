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
            <span class="text">MENU</span></label>
        <input type="checkbox" id="btn-nav"> 
            
        <nav>
          <ul class="navigation">
            <li><a href="./GAMEVERSE.php">HOME</a></li>
            <li><a href="./tienda.html">TIENDA</a></li>
            <li><a href="">FANDOM</a></li>
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





<div class="voltage-button">
  
  <a href="./usuario.php"><button>


  <?php
  session_start();
if (isset($_COOKIE['nombreUsuario'])) {
    $nombreUsuario = $_COOKIE['nombreUsuario'];
    echo "Bienvenido, $nombreUsuario";
} else {
    echo "Bienvenido, invitado";
}
?>


  </button>
  </a>
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 234.6 61.3" preserveAspectRatio="none" xml:space="preserve">
 
    <filter id="glow">
      <feGaussianBlur class="blur" result="coloredBlur" stdDeviation="2"></feGaussianBlur>
      <feTurbulence type="fractalNoise" baseFrequency="0.075" numOctaves="0.3" result="turbulence"></feTurbulence>
  <feDisplacementMap in="SourceGraphic" in2="turbulence" scale="30" xChannelSelector="R" yChannelSelector="G" result="displace"></feDisplacementMap>
      <feMerge>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="coloredBlur"></feMergeNode>
        <feMergeNode in="displace"></feMergeNode>
        <feMergeNode in="SourceGraphic"></feMergeNode>
      </feMerge>
    </filter>
    <path class="voltage line-1" d="m216.3 51.2c-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 6.8-7.3 6.8-3.7 0-3.7-4.6-7.3-4.6-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-0.9-7.3-0.9-3.7 0-3.7-2.7-7.3-2.7-3.7 0-3.7 7.8-7.3 7.8-3.7 0-3.7-4.9-7.3-4.9-3.7 0-3.7-7.8-7.3-7.8-3.7 0-3.7-1.1-7.3-1.1-3.7 0-3.7 3.1-7.3 3.1-3.7 0-3.7 10.9-7.3 10.9-3.7 0-3.7-12.5-7.3-12.5-3.7 0-3.7 4.6-7.3 4.6-3.7 0-3.7 4.5-7.3 4.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-10-7.3-10-3.7 0-3.7-0.4-7.3-0.4-3.7 0-3.7 2.3-7.3 2.3-3.7 0-3.7 7.1-7.3 7.1-3.7 0-3.7-11.2-7.3-11.2-3.7 0-3.7 3.5-7.3 3.5-3.7 0-3.7 3.6-7.3 3.6-3.7 0-3.7-2.9-7.3-2.9-3.7 0-3.7 8.4-7.3 8.4-3.7 0-3.7-14.6-7.3-14.6-3.7 0-3.7 5.8-7.3 5.8-2.2 0-3.8-0.4-5.5-1.5-1.8-1.1-1.8-2.9-2.9-4.8-1-1.8 1.9-2.7 1.9-4.8 0-3.4-2.1-3.4-2.1-6.8s-9.9-3.4-9.9-6.8 8-3.4 8-6.8c0-2.2 2.1-2.4 3.1-4.2 1.1-1.8 0.2-3.9 2-5 1.8-1 3.1-7.9 5.3-7.9 3.7 0 3.7 0.9 7.3 0.9 3.7 0 3.7 6.7 7.3 6.7 3.7 0 3.7-1.8 7.3-1.8 3.7 0 3.7-0.6 7.3-0.6 3.7 0 3.7-7.8 7.3-7.8h7.3c3.7 0 3.7 4.7 7.3 4.7 3.7 0 3.7-1.1 7.3-1.1 3.7 0 3.7 11.6 7.3 11.6 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-12.9 7.3-12.9 3.7 0 3.7 10.9 7.3 10.9 3.7 0 3.7 1.3 7.3 1.3 3.7 0 3.7-8.7 7.3-8.7 3.7 0 3.7 11.5 7.3 11.5 3.7 0 3.7-1.4 7.3-1.4 3.7 0 3.7-2.6 7.3-2.6 3.7 0 3.7-5.8 7.3-5.8 3.7 0 3.7-1.3 7.3-1.3 3.7 0 3.7 6.6 7.3 6.6s3.7-9.3 7.3-9.3c3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7 8.5 7.3 8.5 3.7 0 3.7 0.2 7.3 0.2 3.7 0 3.7-1.5 7.3-1.5 3.7 0 3.7 1.6 7.3 1.6s3.7-5.1 7.3-5.1c2.2 0 0.6 9.6 2.4 10.7s4.1-2 5.1-0.1c1 1.8 10.3 2.2 10.3 4.3 0 3.4-10.7 3.4-10.7 6.8s1.2 3.4 1.2 6.8 1.9 3.4 1.9 6.8c0 2.2 7.2 7.7 6.2 9.5-1.1 1.8-12.3-6.5-14.1-5.5-1.7 0.9-0.1 6.2-2.2 6.2z" fill="transparent" stroke="#fff"></path>
    <path class="voltage line-2" d="m216.3 52.1c-3 0-3-0.5-6-0.5s-3 3-6 3-3-2-6-2-3 1.6-6 1.6-3-0.4-6-0.4-3-1.2-6-1.2-3 3.4-6 3.4-3-2.2-6-2.2-3-3.4-6-3.4-3-0.5-6-0.5-3 1.4-6 1.4-3 4.8-6 4.8-3-5.5-6-5.5-3 2-6 2-3 2-6 2-3 1.6-6 1.6-3-4.4-6-4.4-3-0.2-6-0.2-3 1-6 1-3 3.1-6 3.1-3-4.9-6-4.9-3 1.5-6 1.5-3 1.6-6 1.6-3-1.3-6-1.3-3 3.7-6 3.7-3-6.4-6-6.4-3 2.5-6 2.5h-6c-3 0-3-0.6-6-0.6s-3-1.4-6-1.4-3 0.9-6 0.9-3 4.3-6 4.3-3-3.5-6-3.5c-2.2 0-3.4-1.3-5.2-2.3-1.8-1.1-3.6-1.5-4.6-3.3s-4.4-3.5-4.4-5.7c0-3.4 0.4-3.4 0.4-6.8s2.9-3.4 2.9-6.8-0.8-3.4-0.8-6.8c0-2.2 0.3-4.2 1.3-5.9 1.1-1.8 0.8-6.2 2.6-7.3 1.8-1 5.5-2 7.7-2 3 0 3 2 6 2s3-0.5 6-0.5 3 5.1 6 5.1 3-1.1 6-1.1 3-5.6 6-5.6 3 4.8 6 4.8 3 0.6 6 0.6 3-3.8 6-3.8 3 5.1 6 5.1 3-0.6 6-0.6 3-1.2 6-1.2 3-2.6 6-2.6 3-0.6 6-0.6 3 2.9 6 2.9 3-4.1 6-4.1 3 0.1 6 0.1 3 3.7 6 3.7 3 0.1 6 0.1 3-0.6 6-0.6 3 0.7 6 0.7 3-2.2 6-2.2 3 4.4 6 4.4 3-1.7 6-1.7 3-4 6-4 3 4.7 6 4.7 3-0.5 6-0.5 3-0.8 6-0.8 3-3.8 6-3.8 3 6.3 6 6.3 3-4.8 6-4.8 3 1.9 6 1.9 3-1.9 6-1.9 3 1.3 6 1.3c2.2 0 5-0.5 6.7 0.5 1.8 1.1 2.4 4 3.5 5.8 1 1.8 0.3 3.7 0.3 5.9 0 3.4 3.4 3.4 3.4 6.8s-3.3 3.4-3.3 6.8 4 3.4 4 6.8c0 2.2-6 2.7-7 4.4-1.1 1.8 1.1 6.7-0.7 7.7-1.6 0.8-4.7-1.1-6.8-1.1z" fill="transparent" stroke="#fff"></path>
  </svg>
  <div class="dots">
    <div class="dot dot-1"></div>
    <div class="dot dot-2"></div>
    <div class="dot dot-3"></div>
    <div class="dot dot-4"></div>
    <div class="dot dot-5"></div>
  </div>
</div>
<style>
.voltage-button {
  position: absolute;
  top: 0;
  right: 0; /* Alinea el contenido a la derecha */
  margin-top: 20px; /* Puedes ajustar el margen superior según tus necesidades */
}

/* Resto de estilos... */


.voltage-button button {
  color: purple;
  background: #0D1127;
  padding: 1rem 3rem 1rem 3rem;
  border-radius: 5rem;
  border: 5px solid #5978F3;
  font-size: 1.5rem;
  line-height: 1em;
  letter-spacing: 0.075em;
  transition: background 0.3s;
  
}

.voltage-button button:hover {
  cursor: pointer;
  background: #0F1C53;
}

.voltage-button button:hover + svg, .voltage-button button:hover + svg + .dots {
  opacity: 1;

}

.voltage-button svg {
  display: block;
  position: absolute;
  top: -0.75em;
  left: -0.25em;
  width: calc(100% + 0.5em);
  height: calc(100% + 1.5em);
  pointer-events: none;
  opacity: 0;
  transition: opacity 0.4s;
  transition-delay: 0.1s;
  
}

.voltage-button svg path {
  stroke-dasharray: 100;
  filter: url("#glow");
}

.voltage-button svg path.line-1 {
  stroke: #f6de8d;
  stroke-dashoffset: 0;
  animation: spark-1 3s linear infinite;
}

.voltage-button svg path.line-2 {
  stroke: #6bfeff;
  stroke-dashoffset: 500;
  animation: spark-2 3s linear infinite;
}

.voltage-button .dots {
  opacity: 0;
  transition: opacity 0.3s;
  transition-delay: 0.4s;
}

.voltage-button .dots .dot {
  width: 1rem;
  height: 1rem;
  background: white;
  border-radius: 100%;
  position: absolute;
  opacity: 0;
}

.voltage-button .dots .dot-1 {
  top: 10;
  left: 210%;
  animation: fly-up 3s linear infinite;
}

.voltage-button .dots .dot-2 {
  top: 0;
  left: 55%;
  animation: fly-up 3s linear infinite;
  animation-delay: 0.5s;
}

.voltage-button .dots .dot-3 {
  top: 0;
  left: 80%;
  animation: fly-up 3s linear infinite;
  animation-delay: 1s;
}

.voltage-button .dots .dot-4 {
  bottom: 0;
  left: 30%;
  animation: fly-down 3s linear infinite;
  animation-delay: 2.5s;
}

.voltage-button .dots .dot-5 {
  bottom: 0;
  left: 65%;
  animation: fly-down 3s linear infinite;
  animation-delay: 1.5s;
}

@keyframes spark-1 {
  to {
    stroke-dashoffset: -1000;
  }
}

@keyframes spark-2 {
  to {
    stroke-dashoffset: -500;
  }
}

@keyframes fly-up {
  0% {
    opacity: 0;
    transform: translateY(0) scale(0.2);
  }

  5% {
    opacity: 1;
    transform: translateY(-1.5rem) scale(0.4);
  }

  10%, 100% {
    opacity: 0;
    transform: translateY(-3rem) scale(0.2);
  }
}

@keyframes fly-down {
  0% {
    opacity: 0;
    transform: translateY(0) scale(0.2);
  }

  5% {
    opacity: 1;
    transform: translateY(1.5rem) scale(0.4);
  }

  10%, 100% {
    opacity: 0;
    transform: translateY(3rem) scale(0.2);
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
        <button class="btn" style="box-shadow: 0 0 80px red;"> cel:31468584
        </button>
        <button class="btn" style="box-shadow: 0 0 80px red;"> tel:13498647
        </button>
    
    <button class="btn" style="box-shadow: 0 0 80px red;"> <a href="https://www.google.com/maps/place/Parque+San+Antonio/@6.2455975,-75.5708185,16.25z/data=!4m15!1m8!3m7!1s0x8e4428dfb80fad05:0x42137cfcc7b53b56!2sMedell%C3%ADn,+Antioquia!3b1!8m2!3d6.2476376!4d-75.5658153!16zL20vMDF4XzZz!3m5!1s0x8e44285682622b25:0x549026acddaebe34!8m2!3d6.245725!4d-75.5681414!16s%2Fg%2F121rjknb?entry=ttu">ubicanos</a>
        
    <button class="btn" style="box-shadow: 0 0 80px red;"> correo
    </button>
    </button>
</center>



<br>
<br>
<center>
    <footer class="footer">
        <p>&copy; 2023 Todos los derechos reservados.</p>
    </footer>
</center>
</body>
</html>