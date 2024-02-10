<?php

// Verificar si se ha proporcionado un ID válido mediante GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Conexión a la base de datos
    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Sanitizar el ID del juego para evitar inyección SQL
    $id = mysqli_real_escape_string($conexion, $_GET['id']);

    // Consulta para obtener los datos del juego
    $consulta = "SELECT * FROM productos WHERE id = $id";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        // Obtener el juego como un arreglo asociativo
        $juego = mysqli_fetch_assoc($resultado);

        // Convertir el arreglo asociativo a formato JSON y enviarlo como respuesta
        echo json_encode($juego);
    } else {
        // Si hay un error en la consulta, devolver un mensaje de error
        echo json_encode(array('error' => 'Error al obtener los datos del juego'));
    }

    // Cerrar la conexión con la base de datos
    mysqli_close($conexion);
} else {
    // Si no se proporciona un ID válido, devolver un mensaje de error
    echo json_encode(array('error' => 'ID de juego no válido'));
}


?>
