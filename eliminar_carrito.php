<?php
session_start();

if (isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    // Verifica si se ha proporcionado un ID válido
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $idJuego = $_GET['id'];

        // Conecta con la base de datos (ajusta según tu configuración)
        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consulta para eliminar el juego del carrito
        $consultaEliminar = "DELETE FROM carrito WHERE id_usuario = (SELECT id FROM usuarios WHERE nombre = ?) AND id_producto = ?";
        $stmtEliminar = mysqli_prepare($conexion, $consultaEliminar);
        mysqli_stmt_bind_param($stmtEliminar, "si", $nombreUsuario, $idJuego);
        
        if (mysqli_stmt_execute($stmtEliminar)) {
            echo "Juego eliminado del carrito correctamente.";
            header("Location: carrito.php");
        } else {
            echo "Error al eliminar el juego del carrito: " . mysqli_error($conexion);
        }

        // Cierra la conexión
        mysqli_close($conexion);
    } else {
        echo "ID de juego no válido.";
    }
} else {
    echo "No has iniciado sesión.";
}
?>
