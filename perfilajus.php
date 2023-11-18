<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png">
    <link rel="stylesheet" href="./style/usuario.css">
    <title>Editar Perfil</title>
</head>
<body>
    <a href="./perfil.php" style="display: inline-block;">
        <button>ATRAS</button>
    </a>
    <br>
    <br>

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

    $consultaDatos = "SELECT correo, edad, ubicacion FROM usuarios WHERE nombre = '$nombreUsuario'";
    $resultadoDatos = mysqli_query($conexion, $consultaDatos);

    $correoActual = '';
    $edadActual = '';
    $ubicacionActual = '';

    if ($resultadoDatos) {
        if ($fila = mysqli_fetch_assoc($resultadoDatos)) {
            $correoActual = !empty($fila['correo']) ? $fila['correo'] : '';
            $edadActual = !empty($fila['edad']) ? $fila['edad'] : '';
            $ubicacionActual = !empty($fila['ubicacion']) ? $fila['ubicacion'] : '';
        }
    }

    // Ciudades de Antioquia (puedes cargarlas desde la base de datos)
    $ciudadesAntioquia = array('Medellín', 'Envigado', 'Itagüí', 'Bello', 'Sabaneta', 'Rionegro', 'La Estrella', 'Caldas', 'Copacabana', 'Girardota', 'Barbosa', 'Otra Ciudad');

    mysqli_close($conexion);
    ?>

    <form method="post">
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
        <button type="submit">Guardar cambios</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        $nombreUsuario = $_SESSION['nombreUsuario'];
        $nuevoCorreo = $_POST['nuevoCorreo'];
        $nuevaEdad = $_POST['nuevaEdad'];
        $nuevaLocalidad = $_POST['nuevaLocalidad'];

        $actualizarDatos = "UPDATE usuarios SET correo='$nuevoCorreo', edad='$nuevaEdad', ubicacion='$nuevaLocalidad' WHERE nombre='$nombreUsuario'";
        
        if (mysqli_query($conexion, $actualizarDatos)) {
            mysqli_close($conexion);
            header("Location: perfil.php");
            exit();
        } else {
            echo "Error al actualizar los datos: " . mysqli_error($conexion);
        }
    }
    ?>
</body>
</html>
