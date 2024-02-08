<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

// Validar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado un ID de producto para eliminar
if (isset($_POST['id_producto'])) {
    // Obtener el ID del producto a eliminar desde la solicitud
    $idProducto = $_POST['id_producto'];

    // Consulta SQL para eliminar el producto
    $consulta = "DELETE FROM productos WHERE id = ?";

    // Preparar la consulta
    if ($stmt = mysqli_prepare($conexion, $consulta)) {
        // Vincular parámetros a la consulta
        mysqli_stmt_bind_param($stmt, "i", $idProducto);

        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al ejecutar la consulta de eliminación: " . mysqli_error($conexion);
        }

        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta de eliminación: " . mysqli_error($conexion);
    }
} else {
    echo "No se proporcionó un ID de producto para eliminar.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
