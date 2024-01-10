<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="./styles/reset.css">
    <title>Restablecer Contraseña</title>
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

    function toggleMostrarContrasenas() {
    var contrasenaInputs = document.querySelectorAll('input[type="password"]');
    contrasenaInputs.forEach(function(input) {
        if (input.type === 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    });
}
        </script>

    </div>
</div>

    <div class='login-box'>
       
       <?php
       $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
       if (!$conexion) {
           die("Error de conexión: " . mysqli_connect_error());
       }
   
       if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
           $token = $_GET['token'];
   
           $consultaToken = "SELECT * FROM usuarios WHERE token_recuperacion = '$token' AND TIMESTAMPDIFF(HOUR, fecha_token, NOW()) < 24";
           $resultadoToken = mysqli_query($conexion, $consultaToken);

            if ($resultadoToken && mysqli_num_rows($resultadoToken) == 1) {
                ?>

                <form class='login-box' action='process_reset_password.php' method='post' onsubmit='return submitForm()'>
                <h2>Restablecer Contraseña</h2> 
                <div class='user-box'>
                <input type='password' name='password' required>
                <label for='password'>Nueva Contraseña:</label>
                </div>

                <div class='user-box'>
                <input type='password' name='password_repeated' required>
                <label for='password_repeated'>Repetir Nueva Contraseña:</label>
                </div>
                <button type="button" onclick="toggleMostrarContrasenas()">Mostrar/ocultar contraseñas</button>
                

                <?php echo "<input type='hidden' name='token' value='$token'>"; ?>
                <button class='btn4'><input type='submit'onclick='submitForm()' style='display: none;', style="position: relative;">Restablecer Contraseña</button> 
                </form>
                

                

                <?php
            } else {
                echo "<p class='error-message'>El enlace de restablecimiento de contraseña no es válido o ha expirado. Por favor, solicita un nuevo enlace de recuperación.</p>";
            }
       }
       
       mysqli_close($conexion);
       ?>
    </div>
    
</body>
</html>
<script>
    function toggleMostrarContrasenas() {
        var contrasenaInputs = document.querySelectorAll('input[type="password"]');
        contrasenaInputs.forEach(function(input) {
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password';
            }
        });
    }

    function submitForm() {
        var password = document.getElementsByName('password')[0].value;
        var passwordRepeated = document.getElementsByName('password_repeated')[0].value;

        if (password !== passwordRepeated) {
            var errorElement = document.createElement('p');
            errorElement.textContent = 'Las contraseñas no coinciden';
            errorElement.style.color = 'red';
            var loginBox = document.querySelector('.login-box');
            loginBox.appendChild(errorElement);
            return false; // Evita que el formulario se envíe
        }
        return true; // Envía el formulario si las contraseñas coinciden
    }
</script>