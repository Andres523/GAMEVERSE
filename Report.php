<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png">
    <link rel="stylesheet" href="./styles/R.css">
    <title>Reporte de bugs</title>
</head>
<body>

    <!-- Animacion -->
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
		xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="150%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
		<defs>
			<linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(0, 100, 0, 0.06)"></stop>
                <stop offset="50%" style="stop-color:rgba(0, 100, 0, 0.6)"></stop>
                <stop offset="100%" style="stop-color:rgba(0, 100, 0, 0.2)"></stop>
			</linearGradient>
			<path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
		</defs>
		<g>
			<use xlink:href='#wave' opacity=".3">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="10s"
          calcMode="spline"
          values="270 230; -334 180; 270 230"
          keyTimes="0; .5; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacity=".6">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="8s"
          calcMode="spline"
          values="-270 230;243 220;-270 230"
          keyTimes="0; .6; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
			<use xlink:href='#wave' opacty=".9">
				<animateTransform
          attributeName="transform"
          attributeType="XML"
          type="translate"
          dur="6s"
          calcMode="spline"
          values="0 230;-140 200;0 230"
          keyTimes="0; .4; 1"
          keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
          repeatCount="indefinite" />
			</use>
		</g>
	</svg>

<div class="login-box">

    <h2>Reporte de bugs</h2>
    <div style="text-align: center; color: white;">Puedes escribirnos los problemas que tengas aqui en nuestra bandeja.</div>

    <form action="./Report.php"method="post">
    <br>
    <br>
    <div class="user-box">
    <input type="text" name="nombre" required="">
    <label>nombre de usuario</label>
    </div>
    <div class="user-box">
    <input type="email" id="email" name="email" required>
    <label for="email">Correo electrónico:</label>
    </div>
    <h2>Bandeja de reportes</h2>
    <div class="user-box">
    <textarea id="bug-description" name="bug-description" required></textarea>
    
    </div>
</form>
    <center><button class="btn4" type="submit">Enviar</button></center>


    <?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigoIngresado = trim($_POST['codigoVerificacion']); 

    if ($codigoIngresado === $codigoVerificacion) {
     
}}
?>

    </form>

    <script>
    // Tu código JavaScript aquí
    document.getElementById('bug-report-form').addEventListener('submit', function(event) {
        var description = document.getElementById('bug-description').value;

        if (description.trim() === '') {
            alert('La descripción del bug no puede estar vacía');
            event.preventDefault(); // Evita que el formulario se envíe si hay errores
        }
    });
</script>

</div>
</div>
</body>
</html>
