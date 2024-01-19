
<?php
$conexion = new mysqli("127.0.0.1", "root", "", "gameverse");

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
 

$resultado = $conexion->query("SELECT id, nombre FROM categorias");

if ($resultado === false) {
    die("Error en la consulta SQL: " . $conexion->error);
}

if ($resultado->num_rows > 0) {
    $categorias = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    $categorias = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregarCategoria']) && !empty($_POST['nueva_categoria'])) {
        $nuevaCategoria = $conexion->real_escape_string($_POST['nueva_categoria']);
        $conexion->query("INSERT INTO categorias (nombre) VALUES ('$nuevaCategoria')");

        if ($conexion->affected_rows > 0) {
            echo "Nueva categoría agregada correctamente.";
        } else {
            echo "Error al agregar la nueva categoría: " . $conexion->error;
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['eliminarCategoria']) && isset($_POST['categoria_id'])) {
        $categoriaIdEliminar = $conexion->real_escape_string($_POST['categoria_id']);
        $conexion->query("DELETE FROM categorias WHERE id = '$categoriaIdEliminar'");

        if ($conexion->affected_rows > 0) {
            echo "Categoría eliminada correctamente.";
        } else {
            echo "Error al eliminar la categoría: " . $conexion->error;
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}


$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/categorias.css">
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <div class="login-box">
    <h1>Agregar Categoría</h1>
    <div class="user-box">
        <ul>
            <?php foreach ($categorias as $categoria): ?>
                <li>
                <div class="checkbox">
                    <input class="checkbox__input" type="checkbox" id="categoria_<?php echo $categoria['id']; ?>" name="categorias[]" value="<?php echo $categoria['id']; ?>">

                    <label class="checkbox__label" for="categoria_<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre'];?>
                    <span class="checkbox__custom"></span>
                    </label>
                </div>
                
                </li>
            <?php endforeach; ?>
            <br>
        </ul>
        <label for="nueva_categoria">Nueva Categoría:</label>

        <input type="text" id="nueva_categoria" name="nueva_categoria" required>
        <button type="submit" name="agregarCategoria">Agregar Categoría</button>
    </form>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h3>Eliminar Categoría</h3>

        <label for="categoria_id">Seleccionar Categoría:</label>
        <select id="categoria_id" name="categoria_id" required>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" name="eliminarCategoria">Eliminar Categoría</button>
    </form>
    </div>
    </div>
</body>
</html>