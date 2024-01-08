<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $nombreUsuario = $_SESSION['nombreUsuario'];

    $sql = "SELECT password FROM usuarios WHERE nombre='$nombreUsuario'";
    $resultado = mysqli_query($conexion, $sql);



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

    if (isset($_POST['cambiarCorreo'])) {
        
        $nuevoCorreo = $_POST['nuevoCorreo'];
        if (!filter_var($nuevoCorreo, FILTER_VALIDATE_EMAIL)) {
            $errorCorreo = "El formato de correo electrónico es inválido";
            header("Location: perfilajus.php?errorCorreo=" . urlencode($errorCorreo));
            exit();
        }

        $nombreUsuario = $_SESSION['nombreUsuario'];
        $actualizarCorreo = "UPDATE usuarios SET correo='$nuevoCorreo' WHERE nombre='$nombreUsuario'";

        if (mysqli_query($conexion, $actualizarCorreo)) {
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al cambiar el correo electrónico: " . mysqli_error($conexion);
        }
    }
 
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $contraseñaAlmacenada = $fila['password'];
        
        $contraseñaActual = $_POST['contraseñaActual'];

      
        if ($contraseñaActual === $contraseñaAlmacenada) {
            header("Location: cambio_password.php");
            exit;
        } else {
            echo "La contraseña actual no es correcta. Por favor, inténtalo de nuevo.";
        }
    } else {
        echo "Usuario no encontrado o error en la base de datos.";
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

}
?>

