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
                    <input type='password' name='password' id='password' required>
                    <label for='password'>Nueva Contraseña:</label>
                </div>

                <div class='user-box'>
                    <input type='password' name='password_repeated' id='password_repeated' required>
                    <label for='password_repeated'>Repetir Nueva Contraseña:</label>
                </div>
                
                <label class="pass">
                    <input type="checkbox" checked="checked" onclick="toggleMostrarContrasenas()" >
                    <svg class="eye" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                    <svg class="eye-slash" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><path d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"></path></svg>
                </label>
                
                    <style>
                        
                   
                    .pass {
                      --color: white;
                      --size: 20px;
                      display: flex;
                      justify-content: flex-end;
                      align-items: flex-start;
                      cursor: pointer;
                      font-size: var(--size);
                      user-select: none;
                      fill: var(--color);
                    }
                
                    .pass .eye {
                      position: relative;
                      animation: keyframes-fill .5s;
                      transform-origin: center;
                    }
                
                    .pass .eye-slash {
                      position: relative;
                      animation: keyframes-fill .5s;
                      display: none;
                      transform-origin: center;
                    }
                
                    .pass input:checked ~ .eye {
                      display: none;
                    }
                
                    .pass input:checked ~ .eye-slash {
                      display: block;
                    }
                
                    .pass input {
                      height: 0;
                    
                    }
                
                    
                    @keyframes keyframes-fill {
                      0% {
                        transform: scale(0);
                        opacity: 0;
                      }
                  
                      50% {
                        transform: scale(1.2);
                      }
                    }
                   
                          </style>

                          <br>
                          <br>

                <div id="error-message" style="color: red; margin-top: 5px;"></div>

                <?php echo "<input type='hidden' name='token' value='$token'>"; ?>
                    <button class='btn4'><input type='submit' style='display: none;'>Restablecer Contraseña</button>  
            </form>

            <?php
        } else {
            echo "<p class='error-message'>El enlace de restablecimiento de contraseña no es válido o ha expirado. Por favor, solicita un nuevo enlace de recuperación.</p>";
        }
    }

    mysqli_close($conexion);
    ?>
</div>

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
        var passwordInput = document.getElementById('password');
        var passwordRepeatedInput = document.getElementById('password_repeated');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordRepeatedInput.type = 'text';
        } else {
            passwordInput.type = 'password';
            passwordRepeatedInput.type = 'password';
        }
    }

    function submitForm() {
        var password = document.getElementById('password').value;
        var passwordRepeated = document.getElementById('password_repeated').value;
        var errorMessage = document.getElementById('error-message');

        if (password !== passwordRepeated) {
            errorMessage.textContent = 'Las contraseñas no coinciden';
            return false;
        } else {
            errorMessage.textContent = '';
            return true;
        }
    }
</script>
</body>
</html>
