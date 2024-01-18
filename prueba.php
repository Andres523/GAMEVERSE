<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevaCategoria = $_POST["nuevaCategoria"];
    
    if (!empty($nuevaCategoria)) {
        $conexion = new mysqli("localhost", "root", "", "gameverse");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Utiliza consultas preparadas para prevenir SQL injection
        $consulta = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $consulta->bind_param("s", $nuevaCategoria);

        if ($consulta->execute()) {
            echo "Nueva categoría agregada con éxito.";
        } else {
            echo "Error al agregar la nueva categoría: " . $conexion->error;
        }

        $consulta->close();
        $conexion->close();
    } else {
        echo "El campo de nueva categoría no puede estar vacío.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<form id="categoriaForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="categoria">Categorías:</label>
    <br>
    <select id="categoria" name="categoria">
        <!-- Añade una opción por defecto -->
        <option value="" disabled selected>Selecciona una categoría</option>

        <?php
        $conexion = new mysqli("localhost", "root", "", "gameverse");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $consulta = "SELECT id, nombre FROM categorias";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
            echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
        }

        $conexion->close();
        ?>
    </select>

    <br>

    <!-- Agrega una etiqueta para el campo de nueva categoría -->
    <label for="nuevaCategoria">Nueva Categoría:</label>
    <input type="text" id="nuevaCategoria" name="nuevaCategoria" required>

    <br>

    <button type="submit">+</button>
</form>

</body>
</html>
