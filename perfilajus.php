<?php
        session_start();

        if (!isset($_SESSION['nombreUsuario'])) {
            header("Location: index.php");
            exit();
        }

        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $nombreUsuario = $_SESSION['nombreUsuario'];

        $consultaDatos = "SELECT correo, edad, ubicacion, genero, direccion, imagenPerfil, color, fondo FROM usuarios WHERE nombre = '$nombreUsuario'";
        $resultadoDatos = mysqli_query($conexion, $consultaDatos);

        $correoActual = '';
        $edadActual = '';
        $ubicacionActual = '';
        $generoActual = '';
        $direccionActual = '';
        $imagenPerfil = '';
        $colorFondo = '';
        $fondo ='';
        $contraseñaNoCoincideError = "";

        if ($resultadoDatos && mysqli_num_rows($resultadoDatos) > 0) {
            $fila = mysqli_fetch_assoc($resultadoDatos);
            $correoActual = !empty($fila['correo']) ? $fila['correo'] : '';
            $edadActual = !empty($fila['edad']) ? $fila['edad'] : '';
            $ubicacionActual = !empty($fila['ubicacion']) ? $fila['ubicacion'] : '';
            $generoActual = !empty($fila['genero']) ? $fila['genero'] : '';
            $direccionActual = !empty($fila['direccion']) ? $fila['direccion'] : '';
            $imagenPerfil = !empty($fila['imagenPerfil']) ? $fila['imagenPerfil'] : '';
            $colorFondo = $fila['color'];
            $fondo = $fila['fondo'];
        }

        $ciudadesAntioquia = array('Medellín', 'Envigado', 'Itagüí', 'Bello', 'Sabaneta', 'Rionegro', 'La Estrella', 'Caldas', 'Copacabana', 'Girardota', 'Barbosa', 'Otra Ciudad');


    
        mysqli_close($conexion);
        ?>
        
        

 

   
    
   

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./styles/perfilajus.css">
        <title>Editar Perfil</title>
</head>
 
<body 
id="bodyBackground" style="background-color: <?php echo $colorFondo; ?>; background-image: url('<?php echo $fondo; ?>'); background-repeat: no-repeat; background-size:cover;">
<div class="spinner-overlay">
    <div class="spinner">
     



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

        
        <div class="site-wrapper"> 
            <section class="article-wrapper">
                <div class="article-container">
                    <div class="article-block">
                        <div class="entry-content">
                            <h1>Editar Perfil</h1>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <section class="tabs-wrapper">
                
                <center><div class="tabs-container">
                    <div class="tabs-block">
                        
                        <div id="tabs-section" class="tabs">
                            <ul class="tab-head">
                                <li>
                                    <a href="#tab-1" class="tab-link active"> <span class="material-icons tab-icon">face</span> <span class="tab-label">General</span></a>
                                </li>
                                <li>
                                    <a href="#tab-2" class="tab-link"> <span class="material-icons tab-icon">visibility</span> <span class="tab-label">Avatar</span></a>
                                </li>
                                <li>
                                    <a href="#tab-3" class="tab-link"> <span class="material-icons tab-icon">build</span> <span class="tab-label">Seguridad</span></a>
                                </li>
                                <li>
                                    <a href="#tab-4" class="tab-link"> <span class="material-icons tab-icon">toll</span> <span class="tab-label">Temas</span></a>
                                </li>
                            </ul>

                            <section id="tab-1" class="tab-body entry-content active active-content" >

                                <h2>General</h2>
                                <form method="post" action="procesar_datos.php" id="form-general">

                                    <p>
                                    Configura el nombre y los detalles de tu perfi.
                                    </p>
            


                                    <label for="nuevaLocalidad"><h3>Localidad:</h3></label>

                                    <select id="nuevaLocalidad" name="nuevaLocalidad">
                                        <?php foreach ($ciudadesAntioquia as $ciudad) : ?>
                                            <option value="<?php echo $ciudad; ?>" <?php if ($ciudad === $ubicacionActual) echo 'selected'; ?>>
                                                <?php echo $ciudad; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <br>
                                    <label for="nuevoGenero"><h3>Género:</h3></label>

                                    <select id="nuevoGenero" name="nuevoGenero">
                                        <option value="Hombre" <?php if ($generoActual === 'Hombre') echo 'selected'; ?>>Hombre</option>
                                        <option value="Mujer" <?php if ($generoActual === 'Mujer') echo 'selected'; ?>>Mujer</option>
                                        <option value="Otro" <?php if ($generoActual === 'Otro') echo 'selected'; ?>>Otro</option>
                                    </select>

                                    <label for="nuevaEdad"><h3>Edad:</h3></label>
                                    <div class="user-box">
                                        <input class="input" type="number" id="nuevaEdad" name="nuevaEdad" value="<?php echo $edadActual; ?>" min="18" max="100">
                                        
                                    </div>

                                        
                                    <div class="user-box">
                                        <label for="nuevaDireccion"><h3>Dirección:</h3></label>
                                        <input class="input" type="text" id="nuevaDireccion" name="nuevaDireccion" value="<?php echo $direccionActual; ?>">
                                    </div>
                                        

                                        
                                    <br>
                                    <br>
                    
                                    
                                    
                                    
                                    <center><button class="btn4" type="submit" name="guardarCambiosGenerales">Guardar cambios</button></center>
                                    <br>
                                    <a href="./index.php" ><button class="btn4">Atrás</button></a>
                                </form>

    
                            </section>

                            <section id="tab-2" class="tab-body entry-content">
                                <h2>Avatar</h2>

                                <p>
                                    Agrega una imagen de perfil.
                                </p>

                                <form method="post" action="procesar_datos.php" id="form-avatar" enctype="multipart/form-data">
            
                                    <center>
                                    <div class="item">
                                        <label for="nuevaImagen"><h3>Imagen de perfil:</h3></label>
                                        <?php if (!empty($imagenPerfil)) : ?>
                                            <img class="profile-picture" src="<?php echo $imagenPerfil; ?>" alt="imagen de perfil">
                                        <?php else : ?>
                                            <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <hr>
                                        
                                    <label for="nuevaImagen" class="upload-button">Seleccionar archivo</label>
                                    <input type="file" id="nuevaImagen" name="nuevaImagen" style="display: none;">
                                    <br>
                                    <br>
                                    <p>32px Sube un archivo desde tu dispositivo. La imagen debe ser cuadrada y tener al menos 184 px por lado <p>
                                    
                                        </center>
                                        <br>
                                        
                                        
                                        
                                        <center><button class="btn4" type="submit" name="guardarCambiosAvatar">Guardar cambios</button></center>
                    
                                </form>
                            </section>


                            <section id="tab-3" class="tab-body entry-content">
                                <h1>Seguridad</h1>

                                <h2>Correo</h2>

                                <form method="post" action="procesar_datos.php" id="form-cambiar-correo">
                                    <div class="user-box">
                                        <label for="nuevoCorreo"><h3>Nuevo Correo:</h3></label>
                                        <input class="input" type="email" id="nuevoCorreo" name="nuevoCorreo" required value="<?php echo $correoActual; ?>">
                                    </div>
                                    <button class="btn4" type="submit" name="cambiarCorreo">Cambiar Correo</button>
                                </form>
                                <h2>Cambiar Contraseña</h2>

                                <form method="post" action="procesar_datos.php" id="form-cambiar-contraseña">
                                    <div class="user-box">
                                        <label for="contraseñaActual"><h3>Contraseña Actual:</h3></label>
                                        <input class="input" type="password" id="contraseñaActual" name="contraseñaActual" required>
                                    </div>
                                    <button class="btn4" type="submit" name="verificarContraseña">Verificar Contraseña</button>
                                </form>
           
                                

                             </section>



                            <section id="tab-4" class="tab-body entry-content">
                                <h2>Configuración de Color de Fondo</h2>
                                <form method="post" action="procesar_datos.php" id="form-temas" enctype="multipart/form-data">
                                    <center>
                                        <button class="color-btn" type="button" value="#24282f" style="background-color: #24282f;"></button>
                                        <button class="color-btn" type="button" value="#cc0066" style="background-color: #cc0066;"></button>
                                        <button class="color-btn" type="button" value="#aec6d2" style="background-color: #aec6d2;"></button>
                                        <button class="color-btn" type="button" value="#006600" style="background-color: #006600;"></button>
                                    </center>
                                                                
                                    <input type="hidden" name="selectedColor" id="selectedColor" value="<?php echo $colorFondo; ?>">
                                    <input type="hidden" name="selectedImage" id="selectedImage" value="<?php echo $imagenFondo; ?>">

                                    <br><br>
                                                                               
                                                                
                                     <h2>Imágenes predeterminadas :</h2>
                                    <div class="image-selection">
                                        <label for="image1">
                                            <img src="./img/fondo/1.jpg" alt="Imagen 1">
                                            <input type="radio" id="image1" name="selectedImage" value="./img/fondo/1.jpg">
                                        </label>

                                        <label for="image2">
                                            <img src="./img/fondo/2.jpg" alt="Imagen 2" class="img-preview">
                                            <input type="radio" id="image2" name="selectedImage" value="./img/fondo/2.jpg">
                                        </label>

                                        <label for="image3">
                                            <img src="./img/fondo/3.jpg" alt="Imagen 3" class="img-preview">
                                            <input type="radio" id="image3" name="selectedImage" value="./img/fondo/3.jpg">
                                        </label>

                                        <label for="image4">
                                            <img src="./img/fondo/4.jpg" alt="Imagen 4" class="img-preview">
                                            <input type="radio" id="image4" name="selectedImage" value="./img/fondo/4.jpg">
                                        </label>
                                    </div>

                                    <center><button class="btn4" type="submit" name="guardarCambiosTemas">Guardar cambios</button></center>

                    
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                </center>
            </section>
        </div>
</body>
            
</html>



    <style>

.color-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            margin: 10px;
            cursor: pointer;
            box-shadow: 0 0 35px black;
        }
        /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
@media only screen and (max-width: 1200px) {
                body {
                    width: 100%; 
                    margin: 5px; 
                    text-align: center;
                }
            }



.input {
color: #8707ff;
border: 2px solid #8707ff;
border-radius: 10px;
padding: 10px 25px;
background: transparent;
max-width: 500px;
}
    
.input:active {
box-shadow: 2px 2px 15px #8707ff inset;
}



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./perfil.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const previewImages = document.querySelectorAll('.image-selection input[type="radio"]');

        previewImages.forEach(function(image) {
            image.addEventListener('change', function() {
                const selectedImage = document.querySelector('input[name="selectedImage"]:checked').value;
                document.body.style.backgroundImage = `url(${selectedImage})`;
            });
        });
    });

document.addEventListener("DOMContentLoaded", function() {
    const colorButtons = document.querySelectorAll('.color-btn');
    const selectedColorInput = document.getElementById('selectedColor');
    const guardarCambiosBtn = document.getElementById('guardarCambios');

    colorButtons.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const colorValue = this.value;
            document.body.style.backgroundColor = colorValue;
            if (selectedColorInput) {
                selectedColorInput.value = colorValue;
            }
            console.log('Color seleccionado:', colorValue);
        });
    });

    if (guardarCambiosBtn) {
        guardarCambiosBtn.addEventListener('click', function(event) {
            event.preventDefault();

            const selectedColor = selectedColorInput.value;
            const selectedImageInput = document.getElementById('selectedImage');
            const selectedImage = (selectedImageInput && document.querySelector('.image-selection input[type="radio"]:checked')) ? document.querySelector('.image-selection input[type="radio"]:checked').value : '';

            fetch('guardar_fondo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `selectedColor=${selectedColor}&selectedImage=${selectedImage}`,
            })
            .then(response => {
                if (response.ok) {
                    console.log('Cambios guardados correctamente en la base de datos.');
                    window.location.href = 'perfil.php';
                } else {
                    throw new Error('Error al guardar los cambios en la base de datos.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    }
});

</script>


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
