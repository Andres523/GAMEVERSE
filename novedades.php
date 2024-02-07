<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gameverse";

// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar la eliminación si se recibió un ID de novedad para eliminar
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $sqlEliminar = "DELETE FROM novedades WHERE id = $idEliminar";

    if ($conn->query($sqlEliminar) === TRUE) {
        echo "Novedad eliminada correctamente";
    } else {
        echo "Error al eliminar la novedad: " . $conn->error;
    }
}

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Subir imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $imagen_destino = "./img_novedades/" . $imagen; // Cambia "carpeta_destino" por la carpeta donde deseas guardar las imágenes

    move_uploaded_file($imagen_temp, $imagen_destino);

    // Preparar la consulta SQL para insertar los datos en la base de datos
    $sql = "INSERT INTO novedades (nombre, img, descripcion) VALUES ('$nombre', '$imagen_destino', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Novedad agregada correctamente";
    } else {
        echo "Error al agregar la novedad: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar y Administrar Novedades - Gameverse</title>
</head>
<body>
    <h2>Agregar Nueva Novedad</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>
        
        <label for="imagen">Subir imagen:</label><br>
        <input type="file" id="imagen" name="imagen"><br><br>
        
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Agregar Novedad">
    </form>

    <h2>Administrar Novedades</h2>
    <h3>Novedades</h3>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM novedades";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td><img src='" . $row['img'] . "' alt='" . $row['nombre'] . "' width='100'></td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td><a href='?eliminar=" . $row['id'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay novedades</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
