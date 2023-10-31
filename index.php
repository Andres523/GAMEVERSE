<?php
session_start();

// Verificar si la cookie "nombreUsuario" está configurada
if (isset($_COOKIE["nombreUsuario"])) {
    $nombreUsuario = $_COOKIE["nombreUsuario"];
} else {
    $nombreUsuario = "Invitado"; // Establecer un valor predeterminado si la cookie no está configurada
}

?>
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
<header class="main-header">
    <div class="button-container">
        <button class="btn-login"><a href="./Login.php">Iniciar Sesión</a></button>
        <button class="btn-register"><a href="./register.php">Registrarse</a></button>

        <div class="button" id="settingsBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20" fill="none" class="svg-icon">
                <g stroke-width="1.5" stroke="#5d41de">
                    <circle r="2.5" cy="10" cx="10"></circle>
                    <path fill-rule="evenodd" d="m8.39079 2.80235c.53842-1.51424 2.67991-1.51424 3.21831-.00001.3392.95358 1.4284 1.40477 2.3425.97027 1.4514-.68995 2.9657.82427 2.2758 2.27575-.4345.91407.0166 2.00334.9702 2.34248 1.5143.53842 1.5143 2.67996 0 3.21836-.9536.3391-1.4047 1.4284-.9702 2.3425.6899 1.4514-.8244 2.9656-2.2758 2.2757-.9141-.4345-2.0033.0167-2.3425.9703-.5384 1.5142-2.67989 1.5142-3.21831 0-.33914-.9536-1.4284-1.4048-2.34247-.9703-1.45148.6899-2.96571-.8243-2.27575-2.2757.43449-.9141-.01669-2.0034-.97028-2.3425-1.51422-.5384-1.51422-2.67994.00001-3.21836.95358-.33914 1.40476-1.42841.97027-2.34248-.68996-1.45148.82427-2.9657 2.27575-2.27575.91407.4345 2.00333-.01669 2.34247-.97026z" clip-rule="evenodd"></path>
                </g>
            </svg>
            <span class="label">Configuracion</span>
            <div class="settings-popup" id="settingsPopup">
                <a href="./usuario.php"><button>Perfil</button></a>
                <a href=""><button>Ajustes</button></a>
                <a href=""><button>Reporte bugs</button></a>
            </div>
        </div>
    </div>



        


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
            <li><a href="./index.php">HOME</a></li>
            <li><a href="./tienda.html">TIENDA</a></li>
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

=======
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