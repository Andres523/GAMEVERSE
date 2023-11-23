<?php
session_start();

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $consulta_eliminar = "DELETE FROM usuarios WHERE id = $id_usuario";

    if (mysqli_query($conexion, $consulta_eliminar)) {
      
        echo "Usuario eliminado correctamente";
    } else {
      
        echo "Error al eliminar usuario: " . mysqli_error($conexion);
    }
} else {
    echo "No se proporcionó el ID del usuario a eliminar";
}
?>

<style>
    /*esto es para que la pagina sea responsive en pocas palabras se acomode al tamaño de la ventana coloquenlo donde puedan */
    @media only screen and (max-width: 1200px) {
  .info,
  .perfil,
  .deceados {
      width: 100%; 
      margin: 5px; 
      text-align: center;
  }


  }

</style>