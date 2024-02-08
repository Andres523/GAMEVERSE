<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}


$idCompra = $_POST['idCompra'];
$estadoActual = $_POST['estadoActual'];


$nuevoEstado = $estadoActual == 'Repartidor Enviado' ? 0 : 1;


$consulta_actualizar_estado = "UPDATE compras SET repartidor_enviado = $nuevoEstado WHERE id_compra = $idCompra";


if (mysqli_query($conexion, $consulta_actualizar_estado)) {
    echo "success"; 
} else {
    echo "error"; 
}


mysqli_close($conexion);
?>
