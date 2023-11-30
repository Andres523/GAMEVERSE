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
