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

$consultaDatos = "SELECT correo, edad, ubicacion, genero, direccion, imagenPerfil FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

$correoActual = '';
$edadActual = '';
$ubicacionActual = '';
$generoActual = '';
$direccionActual = '';
$imagenPerfil = '';

if ($resultadoDatos && mysqli_num_rows($resultadoDatos) > 0) {
    $fila = mysqli_fetch_assoc($resultadoDatos);
    $correoActual = !empty($fila['correo']) ? $fila['correo'] : '';
    $edadActual = !empty($fila['edad']) ? $fila['edad'] : '';
    $ubicacionActual = !empty($fila['ubicacion']) ? $fila['ubicacion'] : '';
    $generoActual = !empty($fila['genero']) ? $fila['genero'] : '';
    $direccionActual = !empty($fila['direccion']) ? $fila['direccion'] : '';
    $imagenPerfil = !empty($fila['imagenPerfil']) ? $fila['imagenPerfil'] : '';
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

    $consultaCorreo = "SELECT correo FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultadoCorreo = mysqli_query($conexion, $consultaCorreo);

    if ($resultadoCorreo && mysqli_num_rows($resultadoCorreo) > 0) {
        $filaCorreo = mysqli_fetch_assoc($resultadoCorreo);
        $correoActualBD = $filaCorreo['correo'];

        if ($nuevoCorreo !== $correoActualBD) {
            $codigoVerificacion = substr(md5(rand()), 0, 10);

        
            $actualizarCodigo = "UPDATE usuarios SET correo='$nuevoCorreo', codigo_verificacion='$codigoVerificacion', edad='$nuevaEdad', ubicacion='$nuevaLocalidad', genero='$nuevoGenero', direccion='$nuevaDireccion' WHERE nombre='$nombreUsuario'";
            
            if (mysqli_query($conexion, $actualizarCodigo)) {
               
                $asunto = "Código de verificación para cambio de correo";
                $mensaje = "Su código de verificación es: " . $codigoVerificacion;
                $headers = "From: tuemail@dominio.com";
                mail($nuevoCorreo, $asunto, $mensaje, $headers);

                mysqli_close($conexion);
                header("Location: verificar_correo.php");
                exit();
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }
        } else {
         
            $actualizarDatos = "UPDATE usuarios SET correo='$nuevoCorreo', edad='$nuevaEdad', ubicacion='$nuevaLocalidad', genero='$nuevoGenero', direccion='$nuevaDireccion' WHERE nombre='$nombreUsuario'";
            
       
            if (mysqli_query($conexion, $actualizarDatos)) {
            
                if ($_FILES['nuevaImagen']['error'] === UPLOAD_ERR_OK) {
                  
                    $directorioImagenes = './img/perfiles'; 
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
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/perfilajus.css">
    <title>Editar Perfil</title>
</head>
<body>

<div class="login-box">
  
    <h1>Editar Perfil</h1>
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
            
        <label for="nuevaImagen" class="upload-button">Seleccionar archivo</label>
        <input type="file" id="nuevaImagen" name="nuevaImagen" style="display: none;">
            </center>
            
        <hr>
            
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
                <option value="Otro" <?php if ($generoActual === 'Otro') echo 'selected'; ?>>39 tipos de gay</option>
            </select>
            <label for="nuevaEdad"><h3>Edad:</h3></label>
            <div class="user-box">
            <input type="number" id="nuevaEdad" name="nuevaEdad" value="<?php echo $edadActual; ?>" min="18" max="100">
        
        </div>
        <div class="user-box">
            <input type="email" id="nuevoCorreo" name="nuevoCorreo" value="<?php echo $correoActual; ?>">
            <label for="nuevoCorreo">Correo electrónico:</label>
        </div>
        <div class="user-box">
            <input type="text" id="nuevaDireccion" name="nuevaDireccion" value="<?php echo $direccionActual; ?>">
            <label for="nuevaDireccion">Dirección:</label>
        </div>
        <center><button class="btn4" type="submit">Guardar cambios</button></center>
                
    </form>


</div>

   

    <br>
    <br>

</body>
</html>

<style>
    /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
    @media only screen and (max-width: 1200px) {
            body {
                width: 100%; 
                margin: 5px; 
                text-align: center;
            }
        }

</style>