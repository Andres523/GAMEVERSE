<?php
session_start();

if (isset($_SESSION['nombreUsuario'])) {
    if (isset($_POST['id_juego'])) {
        // Obtén el ID del juego y el ID del usuario
        $id_juego = $_POST['id_juego'];
        $nombreUsuario = $_SESSION['nombreUsuario'];

        // Realiza la conexión a la base de datos
        $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Obtén el ID del usuario
        $consulta_id_usuario = "SELECT id FROM usuarios WHERE nombre = '$nombreUsuario'";
        $resultado_id_usuario = mysqli_query($conexion, $consulta_id_usuario);

        if ($resultado_id_usuario) {
            $fila_id_usuario = mysqli_fetch_assoc($resultado_id_usuario);
            $id_usuario = $fila_id_usuario['id'];

            // Inserta la relación en la tabla de deseos
            $consulta_insertar_deseo = "INSERT INTO deseados (id_usuario, id_juego) VALUES ($id_usuario, $id_juego)";
            $resultado_insertar_deseo = mysqli_query($conexion, $consulta_insertar_deseo);

            if ($resultado_insertar_deseo) {
                header("Location: juego.php?id=$id_juego");
                exit();
            } else {
                echo "Error al agregar el juego a la lista de deseos: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al obtener el ID del usuario.";
        }

        // Cierra la conexión a la base de datos
        mysqli_close($conexion);
    } else {
        echo "ID de juego no válido.";
    }
} else {
    echo "Debes iniciar sesión para agregar juegos a tu lista de deseos.";
}
?>
