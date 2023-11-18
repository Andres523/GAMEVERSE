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
$consultaImagen = "SELECT imagenPerfil FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoImagen = mysqli_query($conexion, $consultaImagen);

$consultaDatos = "SELECT correo, edad, ubicacion, genero, direccion FROM usuarios WHERE nombre = '$nombreUsuario'";
$resultadoDatos = mysqli_query($conexion, $consultaDatos);

$correoActual = '';
$edadActual = '';
$ubicacionActual = '';
$generoActual = '';
$direccionActual = '';
$imagenPerfil = '';

if ($resultadoImagen) {
    $filaImagen = mysqli_fetch_assoc($resultadoImagen);
    $imagenPerfil = $filaImagen['imagenPerfil'];
}

if ($resultadoDatos) {
    if ($fila = mysqli_fetch_assoc($resultadoDatos)) {
        $correoActual = !empty($fila['correo']) ? $fila['correo'] : '';
        $edadActual = !empty($fila['edad']) ? $fila['edad'] : '';
        $ubicacionActual = !empty($fila['ubicacion']) ? $fila['ubicacion'] : '';
        $generoActual =  !empty($fila['genero']) ? $fila['genero'] : '';
        $direccionActual =  !empty($fila['direccion']) ? $fila['direccion'] : '';
    }
}

$ciudadesAntioquia = array('Medellín', 'Envigado', 'Itagüí', 'Bello', 'Sabaneta', 'Rionegro', 'La Estrella', 'Caldas', 'Copacabana', 'Girardota', 'Barbosa', 'Otra Ciudad');

mysqli_close($conexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    $nombreUsuario = $_SESSION['nombreUsuario'];
    $nuevoCorreo = $_POST['nuevoCorreo'];
    $nuevaEdad = $_POST['nuevaEdad'];
    $nuevaLocalidad = $_POST['nuevaLocalidad'];
    $nuevoGenero = $_POST['nuevoGenero'];
    $nuevaDireccion = $_POST['nuevaDireccion'];

    // Obtener el correo actual almacenado en la base de datos
    $consultaCorreo = "SELECT correo FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultadoCorreo = mysqli_query($conexion, $consultaCorreo);

    if ($resultadoCorreo) {
        $filaCorreo = mysqli_fetch_assoc($resultadoCorreo);
        $correoActual = $filaCorreo['correo'];

        if ($correoActual !== $nuevoCorreo) {
            // Si el correo es diferente, generar un nuevo código de verificación
            $codigoVerificacion = generarCodigoVerificacion();

            $actualizarDatos = "UPDATE usuarios SET correo='$nuevoCorreo', edad='$nuevaEdad', ubicacion='$nuevaLocalidad', genero='$nuevoGenero', direccion='$nuevaDireccion', codigo_verificacion='$codigoVerificacion' WHERE nombre='$nombreUsuario'";
            
            if (mysqli_query($conexion, $actualizarDatos)) {
                mysqli_close($conexion);

                $asunto = 'Verificación de correo electrónico';
                $mensaje = 'Su código de verificación es: ' . $codigoVerificacion;
                $cabeceras = 'From: tu_correo@tudominio.com';

                $envioCorreo = mail($nuevoCorreo, $asunto, $mensaje, $cabeceras);

                if ($envioCorreo) {
                    // Redirige a verificar_correo.php si el correo cambió
                    header("Location: verificar_correo.php"); 
                    exit();
                } else {
                    echo "Error al enviar el correo de verificación.";
                }
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }
        } else {
            // Si el correo no cambió, realizar la actualización sin código de verificación
            $actualizarDatos = "UPDATE usuarios SET edad='$nuevaEdad', ubicacion='$nuevaLocalidad', genero='$nuevoGenero', direccion='$nuevaDireccion' WHERE nombre='$nombreUsuario'";
            
            if (mysqli_query($conexion, $actualizarDatos)) {
                mysqli_close($conexion);
                
                // Redirige a perfil.php si el correo no cambió
                header("Location: perfil.php"); 
                exit();
            } else {
                echo "Error al actualizar los datos: " . mysqli_error($conexion);
            }
        }
    }

    if (!empty($_FILES['nuevaImagen']['tmp_name'])) {
        $imagen = file_get_contents($_FILES['nuevaImagen']['tmp_name']);
        $imagen = mysqli_real_escape_string($conexion, $imagen);

        $actualizarImagen = "UPDATE usuarios SET imagenPerfil='$imagen' WHERE nombre='$nombreUsuario'";

        if (mysqli_query($conexion, $actualizarImagen)) {
            echo "Imagen de perfil actualizada con éxito.";
        } else {
            echo "Error al actualizar la imagen de perfil: " . mysqli_error($conexion);
        }
    }
}

function generarCodigoVerificacion($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitudCaracteres = strlen($caracteres);
    $codigoVerificacion = '';

    for ($i = 0; $i < $longitud; $i++) {
        $codigoVerificacion .= $caracteres[rand(0, $longitudCaracteres - 1)];
    }

    return $codigoVerificacion;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
</head>
<body>


    <h1>Editar Perfil</h1>

    
    <form method="post" enctype="multipart/form-data">
        <label for="nuevoCorreo">Correo electrónico:</label>
        <input type="email" id="nuevoCorreo" name="nuevoCorreo" value="<?php echo $correoActual; ?>">
        <br>
        
        <label for="nuevaEdad">Edad:</label>
        <input type="number" id="nuevaEdad" name="nuevaEdad" value="<?php echo $edadActual; ?>">
        <br>
        
        <label for="nuevaLocalidad">Localidad:</label>
        <select id="nuevaLocalidad" name="nuevaLocalidad">
            <?php foreach ($ciudadesAntioquia as $ciudad) : ?>
                <option value="<?php echo $ciudad; ?>" <?php if ($ciudad === $ubicacionActual) echo 'selected'; ?>>
                    <?php echo $ciudad; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
            
        <label for="nuevoGenero">Género:</label>
        <select id="nuevoGenero" name="nuevoGenero">
            <option value="Hombre" <?php if ($generoActual === 'Hombre') echo 'selected'; ?>>Hombre</option>
            <option value="Mujer" <?php if ($generoActual === 'Mujer') echo 'selected'; ?>>Mujer</option>
            <option value="Otro" <?php if ($generoActual === 'Otro') echo 'selected'; ?>>39 tipos de gay</option>
        </select>
        <br>
            
        <label for="nuevaDireccion">Dirección:</label>
        <input type="text" id="nuevaDireccion" name="nuevaDireccion" value="<?php echo $direccionActual; ?>">
        <br>
        
        <label for="nuevaImagen">Imagen de perfil:</label>
        <input type="file" id="nuevaImagen" name="nuevaImagen">

        <div class="perfil">
        <div class="item">
            <?php if (!empty($imagenPerfil)) : ?>
                <img class="profile-picture" src="data:image/jpeg;base64,<?php echo base64_encode($imagenPerfil); ?>" alt="imagen de perfil">
            <?php else : ?>
                <img class="profile-picture" src="./img/logo.png" alt="imagen de perfil predeterminada">
            <?php endif; ?>

        </div>
        <br>

        <br>
        <br>
            
        <button type="submit">Guardar cambios</button>
    </form>
</body>
</html>
