<?php

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_usuario'])) {
    $idUsuario = $_POST['id_usuario'];
    $nuevoNombre = $_POST['nuevo_nombre'];
    $nuevoCorreo = $_POST['nuevo_correo'];
    $nuevaContrasena = $_POST['nueva_contrasena'];

   
    $consulta = "UPDATE usuarios SET nombre = '$nuevoNombre', correo = '$nuevoCorreo', password = '$nuevaContrasena' WHERE id = $idUsuario";

    if (mysqli_query($conexion, $consulta)) {
     
        echo "Datos actualizados correctamente";
    } else {
      
        echo "Error al actualizar datos: " . mysqli_error($conexion);
    }
} else {

    echo "No se recibieron datos para actualizar";
}
?>
