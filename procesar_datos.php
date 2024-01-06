<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

  
    if (isset($_POST['guardarCambiosGenerales'])) {
        $nuevaLocalidad = mysqli_real_escape_string($conexion, $_POST['nuevaLocalidad']);
        $nuevoGenero = mysqli_real_escape_string($conexion, $_POST['nuevoGenero']);
        $nuevaEdad = mysqli_real_escape_string($conexion, $_POST['nuevaEdad']);
        $nuevaDireccion = mysqli_real_escape_string($conexion, $_POST['nuevaDireccion']);

        $nombreUsuario = $_SESSION['nombreUsuario'];
        $actualizarDatos = "UPDATE usuarios SET ubicacion='$nuevaLocalidad', genero='$nuevoGenero', edad='$nuevaEdad', direccion='$nuevaDireccion' WHERE nombre='$nombreUsuario'";

        if (mysqli_query($conexion, $actualizarDatos)) {
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion);
        }
    }

    if (isset($_POST['guardarCambiosAvatar'])) {
        if ($_FILES['nuevaImagen']['error'] === UPLOAD_ERR_OK) {
            $directorioImagenes = './img/perfiles/';
            $nombreArchivo = $_FILES['nuevaImagen']['name'];
            $rutaArchivo = $directorioImagenes . $nombreArchivo;

            if (move_uploaded_file($_FILES['nuevaImagen']['tmp_name'], $rutaArchivo)) {
                $nombreUsuario = $_SESSION['nombreUsuario'];
                $actualizarImagen = "UPDATE usuarios SET imagenPerfil='$rutaArchivo' WHERE nombre='$nombreUsuario'";

                if (mysqli_query($conexion, $actualizarImagen)) {
              
                    header("Location: perfil.php");
                    exit();
                } else {
                    echo "Error al actualizar la imagen de perfil: " . mysqli_error($conexion);
                }
            } else {
                echo "Error al subir la imagen de perfil.";
            }
        }
    }


function generarCodigoVerificacion() {
    $longitud = 8;
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';

  
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }

    return $codigo;
}





    if (isset($_POST['enviarCodigoAlCorreo'])) {
        
        $nuevoCorreo = $_POST['nuevoCorreo'];
    
      
        $codigoVerificacion = generarCodigoVerificacion(); 
    

        $asunto = "Código de verificación para cambio de correo";
        $mensaje = "Tu código de verificación es: " . $codigoVerificacion;
    

        $cabeceras = "From: tu_correo@example.com" . "\r\n" .
            "Reply-To: tu_correo@example.com" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();
    
 
        if (mail($nuevoCorreo, $asunto, $mensaje, $cabeceras)) {
            echo "Se ha enviado el código de verificación al correo electrónico proporcionado.";
          
         
            $_SESSION['codigo_verificacion'] = $codigoVerificacion;
        } else {
            echo "Error al enviar el código de verificación.";
        }
    
   
        header("Location: formulario_codigo_verificacion.php");
        exit();
    }
    if (isset($_POST['verificarCodigo'])) {
        $codigoIngresado = $_POST['codigoVerificacion'];
    
     
        if (isset($_SESSION['codigo_verificacion']) && $_SESSION['codigo_verificacion'] === $codigoIngresado) {


            if (isset($_POST['nuevoCorreo'])) {
                $nuevoCorreo = $_POST['nuevoCorreo'];
    
               
                $conexion = mysqli_connect("localhost", "usuario", "contraseña", "nombre_basedatos");
    
                if (!$conexion) {
                    die("Error de conexión: " . mysqli_connect_error());
                }
    
               
                $nombreUsuario = $_SESSION['nombreUsuario'];
    
               
                $actualizarCorreo = "UPDATE usuarios SET correo = '$nuevoCorreo' WHERE nombre = '$nombreUsuario'";
    
                if (mysqli_query($conexion, $actualizarCorreo)) {
                    echo "El correo electrónico se ha actualizado correctamente.";
                } else {
                    echo "Error al actualizar el correo: " . mysqli_error($conexion);
                }
    
                mysqli_close($conexion);
            } else {
                echo "No se proporcionó un nuevo correo electrónico.";
            }
    
          
            unset($_SESSION['codigo_verificacion']);
    
         
            header("Location: perfil.php");
            exit();
        } else {
           
            echo "El código de verificación es incorrecto.";
        }
    }
    

   
    if (isset($_POST['guardarCambiosTemas'])) {
        $colorSeleccionado = $_POST['selectedColor'];
        $imagenSeleccionada = $_POST['selectedImage'];

        $nombreUsuario = $_SESSION['nombreUsuario'];
        $actualizarTemas = "UPDATE usuarios SET color='$colorSeleccionado', fondo='$imagenSeleccionada' WHERE nombre='$nombreUsuario'";

        if (mysqli_query($conexion, $actualizarTemas)) {
           
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar los temas: " . mysqli_error($conexion);
        }
    }




    mysqli_close($conexion);
} else {
   
    header("Location: perfil.php");
    exit();
}
?>
