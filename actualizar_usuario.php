<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "gameverse");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir los datos del formulario
$idUsuario = $_POST['id'];
$nuevoNombre = $_POST['nombre'];
$nuevoCorreo = $_POST['correo'];
$nuevaContrasena = $_POST['contrasena'];

// Preparar la consulta SQL para actualizar el usuario
$sql = "UPDATE usuarios SET nombre='$nuevoNombre', correo='$nuevoCorreo', password='$nuevaContrasena' WHERE id=$idUsuario";

// Ejecutar la consulta y verificar si se actualizó correctamente
if ($conexion->query($sql) === TRUE) {
    echo "Los datos del usuario se actualizaron correctamente";
} else {
    echo "Error al actualizar los datos del usuario: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
