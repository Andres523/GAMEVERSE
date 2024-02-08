<?php
// Conexión a la base de datos
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado un parámetro de búsqueda
if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombreABuscar = $_GET['nombre'];

    // Consulta SQL para buscar productos por nombre
    $consulta = "SELECT id, nombre, descripcion, requisitos, cantidad, precio, imagen FROM productos WHERE nombre LIKE '%$nombreABuscar%'";

    // Ejecutar la consulta
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Generar el contenido HTML de la tabla de resultados
        echo '<table>';
        echo '<tr>
                <th>ID: </th>
                <th>Imagen: </th>
                <th>Nombre: </th>
                <th>Descripción: </th>
                <th>Requisitos: </th>
                <th>Cantidad: </th>
                <th>Precio: </th>
                <th>Acciones: </th>
              </tr>';

        while ($fila = mysqli_fetch_assoc($resultado)) {
            echo '<tr>';
            echo '<td>' . $fila['id'] . '</td>';
            echo '<td><img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" height="50"></td>';
            echo '<td>' . $fila['nombre'] . '</td>';
            echo '<td>' . $fila['descripcion'] . '</td>';
            echo '<td>' . $fila['requisitos'] . '</td>';
            echo '<td>';
            if ($fila['cantidad'] == 0) {
                echo '<span style="color: red;">Agotado</span>';
            } else {
                echo $fila['cantidad'];
            }
            echo '</td>';
            echo '<td style="color: green;">' . $fila['precio'] . ' COP' . '</td>';
            echo '<td> 
                    <button class="edit-button" type="button" onclick="editarProducto(' . $fila['id'] . ')">
                        <svg class="edit-svgIcon" viewBox="0 0 512 512">
                            <!-- SVG Path para editar -->
                        </svg>
                    </button>
                    
                    <button class="delete-button" type="button" onclick="eliminarProducto(' . $fila['id'] . ')">
                        <svg class="delete-svgIcon" viewBox="0 0 448 512">
                            <!-- SVG Path para eliminar -->
                        </svg>
                    </button>
                  </td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        // Si no se encuentran resultados
        echo 'No se encontraron productos.';
    }
} else {
    // Si no se proporcionó un parámetro de búsqueda válido
    echo 'Ingrese un término de búsqueda válido.';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>

