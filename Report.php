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
<a href="./index.php" ><button class="btn4">Atrás</button></a>
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
    <center><button class="btn4" type="submit">Enviar</button></center>
</form>


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

<?php
    error_reporting(E_ALL);

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
    
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombreUsuario = $_POST['nombre'];
        $email = $_POST['email'];
        $descripcionBug = $_POST['bug-description'];
    
        // Realizar validaciones si es necesario
    
        // Insertar el reporte de bug en la base de datos
        $sql = "INSERT INTO reportes_bugs (nombre_usuario, email, descripcion_bug) VALUES ('$nombreUsuario', '$email', '$descripcionBug')";
    
        if (mysqli_query($conexion, $sql)) {
            echo "<p style='color: green;'>Reporte de bug enviado con éxito.</p>";
    
            // Envío de notificación por correo electrónico (simulación)
            $to = 'correo_administrador@gmail.com';
            $subject = 'Nuevo Reporte de Bug';
            $message = "Se ha recibido un nuevo reporte de bug.\n\n";
            $message .= "Nombre de Usuario: $nombreUsuario\n";
            $message .= "Correo Electrónico: $email\n";
            $message .= "Descripción del Bug:\n$descripcionBug";
    
            $headers = 'From: tu_correo@gmail.com' . "\r\n" .
                       'Reply-To: tu_correo@gmail.com' . "\r\n" .
                       'X-Mailer: PHP/' . phpversion();
    
            mail($to, $subject, $message, $headers);
        } else {
            echo "<p style='color: red;'>Error al enviar el reporte de bug: " . mysqli_error($conexion) . "</p>";
        }
    }
    
    mysqli_close($conexion);
    ?>

</div>
</div>
</body>
</html>
