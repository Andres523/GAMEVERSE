<?php
session_start();

// Conectar a la base de datos
$conexion = mysqli_connect("127.0.0.1", "samuel", "samux523", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si la cookie existe
if (isset($_COOKIE['nombreUsuario'])) {
    $nombreUsuario = $_COOKIE['nombreUsuario'];

    $sql = "SELECT * FROM usuarios WHERE nombre='$nombreUsuario'";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        // Obtiene los datos del usuario
        $datosUsuario = mysqli_fetch_assoc($resultado);
    } else {
        echo "Error al obtener los datos del usuario.";
    }
} else {
    echo "Bienvenido, invitado";
}

// Procesar el formulario de edición de perfil si se envió
if (isset($_POST['editarPerfil'])) {
    // Obtener los nuevos valores del formulario
    $nuevaEdad = $_POST['edad'];
    $nuevaFechaNacimiento = $_POST['fechaNacimiento'];
    $nuevoGenero = $_POST['genero'];
    

    // Actualizar la imagen de perfil si se seleccionó una nueva
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['imagen']['name'];
        $archivoTemporal = $_FILES['imagen']['tmp_name'];

        // Aquí debes mover la imagen a una ubicación permanente y actualizar la ruta en la base de datos
        // Por ejemplo:
        $rutaDestino = "./img/perfiles/" . $nombreArchivo;
        move_uploaded_file($archivoTemporal, $rutaDestino);

        // Luego, actualiza la ruta de la imagen en la base de datos
        $sqlActualizarImagen = "UPDATE usuarios SET imagenPerfil='$rutaDestino' WHERE nombre='$nombreUsuario'";
        mysqli_query($conexion, $sqlActualizarImagen);
    }

    // Actualizar edad y fecha de nacimiento en la base de datos
    $sqlActualizarPerfil = "UPDATE usuarios SET edad=$nuevaEdad, fechaNacimiento='$nuevaFechaNacimiento', genero='$nuevoGenero' WHERE nombre='$nombreUsuario'";
    if (mysqli_query($conexion, $sqlActualizarPerfil)) {
        // Redirige al usuario de regreso a la página de perfil
        header("Location: usuario.php");
        exit(); // Asegura que el script termine después de redirigir
    } else {
        echo "Error al actualizar el perfil: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylegameverse.css">
    <title>Editar Perfil</title>
</head>
<body>

    <center>
        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="imagen">Cambiar Imagen de Perfil:</label>
                <input type="file" name="imagen" id="imagen">
                <br><br>
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" value="<?php echo $datosUsuario['edad']; ?>">
                <br><br>
                <label for="fechaNacimiento">Cambiar Fecha de Nacimiento:</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="<?php echo $datosUsuario['fechaNacimiento']; ?>">
                <br><br>
                <label for="genero">Género:</label>
                <select name="genero" id="genero">
                    <option value="hombre" <?php if ($datosUsuario['genero'] === 'hombre') echo 'selected'; ?>>Hombre</option>
                    <option value="mujer" <?php if ($datosUsuario['genero'] === 'mujer') echo 'selected'; ?>>Mujer</option>
                </select>
                <br><br>
                <!-- ... otros campos ... -->
                <label for="ubicacion">Cambiar Pais</label>
                <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $datosUsuario['ubicacion']; ?>">
                <br><br>
                <label for="direccion">Cambiar Dirección:</label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $datosUsuario['direccion']; ?>">
                <br><br>
                <a href="./usuario.php"><input type="submit" value="Guardar Cambios" name="editarPerfil"></a>
            </form>
        </div>
    </center>
</body>
</html>

<style>
    div {
        background-color: #fff;
        width: 450px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
