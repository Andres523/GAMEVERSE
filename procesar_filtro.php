<?php

$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$filtro_nombre = isset($_POST['search']) ? mysqli_real_escape_string($conexion, $_POST['search']) : '';
$filtro_categorias = isset($_POST['categorias']) ? $_POST['categorias'] : array();

$consulta = "SELECT id, nombre, descripcion, requisitos, precio, imagen, cantidad, categoria FROM productos WHERE 1";

if (!empty($filtro_nombre)) {
    $consulta .= " AND nombre LIKE '%$filtro_nombre%'";
}

if (!empty($filtro_categorias)) {
    $condiciones_categorias = array();

    foreach ($filtro_categorias as $categoria) {
        $condiciones_categorias[] = "categoria LIKE '%,$categoria,%'";
    }
    
    $consulta .= " AND (" . implode(' AND ', $condiciones_categorias) . ")";
}

$resultado = mysqli_query($conexion, $consulta);


if ($resultado) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<a href="juego.php?id=' . $fila['id'] . '" class="juego-link">';
        echo '<figure class="card">';
        echo '<img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" style="width: 100%; min-height: 100%; object-fit: cover;">';
        echo '<figcaption>';
        echo '<h2 style="text-decoration: none;">' . $fila['nombre'] . '</h2>';
        
        if ($fila['cantidad'] > 0) {
            echo '<p style="color: green;">Precio: $' . $fila['precio'] . '</p>';
        } else {
            echo '<p style="color: red; text-align: center;">Agotado</p>';
        }

        echo '</figcaption>';
        echo '</figure>';
        echo '</a>';
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}


mysqli_close($conexion);
?>
