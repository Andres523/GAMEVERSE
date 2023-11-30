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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
        
            if (!$conexion) {
                die("Error de conexión: " . mysqli_connect_error());
            }


            $nuevoCorreo = $_POST['nuevoCorreo'];
            $nuevaEdad = $_POST['nuevaEdad'];
            $nuevaLocalidad = $_POST['nuevaLocalidad'];
            $nuevoGenero = $_POST['nuevoGenero'];
            $nuevaDireccion = $_POST['nuevaDireccion'];
            $colorSeleccionado = $_POST['selectedColor'];
            $imagenSeleccionada = $_POST['selectedImage'];
            

            $actualizarDatos = "UPDATE usuarios SET color='$selectedColor', fondo='$selectedImage', ubicacion='$nuevaLocalidad', genero='$nuevoGenero', edad='$nuevaEdad', direccion='$nuevaDireccion', correo='$nuevoCorreo' WHERE nombre='$nombreUsuario'";


            if (mysqli_query($conexion, $actualizarDatos)) {
                mysqli_close($conexion);
                header("Location: perfil.php");
                exit();
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }

                
                if (mysqli_query($conexion, $actualizarDatos)) {
                
                    if ($_FILES['nuevaImagen']['error'] === UPLOAD_ERR_OK) {
                    
                        $directorioImagenes = './img/perfiles/'; 
                        $nombreArchivo = $_FILES['nuevaImagen']['name'];
                        $rutaArchivo = $directorioImagenes . $nombreArchivo;
                    
                        if (move_uploaded_file($_FILES['nuevaImagen']['tmp_name'], $rutaArchivo)) {
                        
                            $actualizarImagen = "UPDATE usuarios SET imagenPerfil='$rutaArchivo' WHERE nombre='$nombreUsuario'";
                            if (mysqli_query($conexion, $actualizarImagen)) {
                            
                                mysqli_close($conexion);
                                header("Location: perfil.php"); 
                                exit();
                            } else {
                                echo "Error al actualizar la imagen de perfil: " . mysqli_error($conexion);
                            }
                        } else {
                            echo "Error al subir la imagen de perfil.";
                        }
                    } else {
                        mysqli_close($conexion);
                        header("Location: perfil.php");
                        exit();
                    }
                } else {
                    echo "Error al actualizar los datos: " . mysqli_error($conexion);
                }
                
            
        }
        
        
        
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

<body id="bodyBackground" style="background-color: <?php echo $colorFondo; ?>; background-image: url('<?php echo $fondo; ?>'); background-repeat: no-repeat; background-size:cover;">


        
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
            <a href="./index.php" ><button class="btn4">Atrás</button></a>
            <section class="tabs-wrapper">
                
                <div class="tabs-container">
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
                            <section id="tab-1" class="tab-body entry-content active active-content">

                                <h2>General</h2>
                                <form method="post" enctype="multipart/form-data">

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
                    
                                    
                                    
                                    
                                    <center><button class="btn4" type="submit">Guardar cambios</button></center>
                                </form>

    
                            </section>

                            <section id="tab-2" class="tab-body entry-content">
                                <h2>Avatar</h2>

                                <p>
                                    Agrega una imagen de perfil.
                                </p>

                                <form method="post" enctype="multipart/form-data">
            
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
                                        
                                        
                                        
                                    <center><button class="btn4" type="submit">Guardar cambios</button></center>
                    
                                </form>
                            </section>


                            <section id="tab-3" class="tab-body entry-content">
                                <h2>Seguirdad</h2>
                                    <form method="post" enctype="multipart/form-data">

                                        <div class="user-box">
                                            <label for="nuevoCorreo"><h3>Correo electrónico:</h3></label>
                                            <input class="input" type="email" id="nuevoCorreo" name="nuevoCorreo" value="<?php echo $correoActual; ?>">
                                            
                                        </div>


            
            

                                        <div class="user-box">
                                            <h3>cambio de contraseña:</h3>

                                        </div>

        


                                        <center><button class="btn4" type="submit">Guardar cambios</button></center>
                    
                                    </form>
                            </section>

                            <section id="tab-4" class="tab-body entry-content">
                                <h2>Configuración de Color de Fondo</h2>
                                <form id="configuracionForm" method="post">
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

                                    <center><button id="guardarCambios" class="btn4" type="submit">Guardar cambios</button></center>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
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

