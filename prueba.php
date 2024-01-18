<?php
// Conecta a tu base de datos
$conexion = new mysqli("127.0.0.1", "root", "", "gameverse");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Realiza la consulta para obtener las categorías
$resultado = $conexion->query("SELECT id, nombre FROM categorias");

// Verifica si la consulta fue exitosa
if ($resultado === false) {
    die("Error en la consulta SQL: " . $conexion->error);
}

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Almacena las categorías en un arreglo
    $categorias = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    // Si no hay categorías, puedes manejarlo según tus necesidades
    $categorias = [];
}

// Procesa la adición de nuevas categorías
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nueva_categoria']) && !empty($_POST['nueva_categoria'])) {
        $nuevaCategoria = $_POST['nueva_categoria'];

        // Escapa la nueva categoría para evitar inyección SQL (usa sentencias preparadas si es posible)
        $nuevaCategoria = $conexion->real_escape_string($nuevaCategoria);

        // Inserta la nueva categoría en la base de datos
        $conexion->query("INSERT INTO categorias (nombre) VALUES ('$nuevaCategoria')");

        // Verifica si la inserción fue exitosa
        if ($conexion->affected_rows > 0) {
            echo "Nueva categoría agregada correctamente.";
        } else {
            echo "Error al agregar la nueva categoría: " . $conexion->error;
        }

        // Redirige para evitar reenviar el formulario al recargar la página
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checklist de Categorías</title>
</head>
<body>

    <h1>Checklist de Categorías</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <ul>
            <?php foreach ($categorias as $categoria): ?>
                <li>
                    <input type="checkbox" id="categoria_<?php echo $categoria['id']; ?>" name="categorias[]" value="<?php echo $categoria['id']; ?>">
                    <label for="categoria_<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></label>
                </li>
            <?php endforeach; ?>
        </ul>

        <label for="nueva_categoria">Nueva Categoría:</label>
        <input type="text" id="nueva_categoria" name="nueva_categoria" required>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>
