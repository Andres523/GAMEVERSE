<?php
$conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$consulta = "SELECT id, nombre, descripcion, cantidad, precio, imagen FROM marcketplace";

if (isset($_GET['buscarNombre']) && !empty($_GET['buscarNombre'])) {
    $nombreABuscar = $_GET['buscarNombre'];
    $consulta .= " WHERE nombre LIKE '%$nombreABuscar%'";
}

$resultado = mysqli_query($conexion, $consulta);
?>

<div class="">
    <div id="tablaProductos" class="tab">
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            echo '<table>';
            echo '<tr>
                    <th>ID: </th>
                    <th>Imagen: </th>
                    <th>Nombre: </th>
                    <th>Descripción: </th>
                    <th>Cantidad: </th>
                    <th>Precio: </th>
                    <th>Acciones: </th>
                  </tr> ';

            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';
                echo '<td>' . $fila['id'] . '</td>';
                echo '<td><img src="' . $fila['imagen'] . '" alt="' . $fila['nombre'] . '" height="50"></td>';
                echo '<td>' . $fila['nombre'] . '</td>';
                echo '<td>' . $fila['descripcion'] . '</td>';
                echo '<td>';
                if ($fila['cantidad'] == 0) {
                    echo '<span style="color: red;">Agotado</span>';
                } else {
                    echo $fila['cantidad'];
                }
                echo '</td>';
                echo '<td style="color: green;">' . $fila['precio'] . ' COP' . '</td>';
                echo '<td> 
                        <button class="edit-button" type="button" onclick="abrirModalEditar(' . $fila['id'] . ')">
                            Editar
                        </button>
                        <button class="delete-button" type="button" onclick="abrirModalEliminar(' . $fila['id'] . ')">
                            Eliminar
                        </button>
                    </td>';
                echo '</tr>';
            }

            echo '</table>';

        } else {
            echo 'No hay productos disponibles.';
        }

        ?>

<div id="modalEditar" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModalEditar()">&times;</span>
        <div class="container">
            <h2>Editar Producto</h2>
            <form id="formEditarProducto" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <input type="hidden" id="edit-id" name="id">
                <label for="edit-nombre">Nombre:</label>
                <input type="text" id="edit-nombre" name="nombre">
                <label for="edit-descripcion">Descripción:</label>
                <textarea id="edit-descripcion" name="descripcion"></textarea>
                <label for="edit-cantidad">Cantidad:</label>
                <input type="number" id="edit-cantidad" name="cantidad">
                <label for="edit-precio">Precio:</label>
                <input type="number" id="edit-precio" name="precio">
                <label for="edit-imagen">Imagen</label>
                <input type="file" id="edit-imagen" name="imagen" accept="image/*">
                <button type="submit">Guardar Cambios</button>
            </form>

            <?php
            mysqli_close($conexion);
            ?>
        </div>
    </div>
</div>

<!-- MODAL ELIMINAR-->
<div id="modalEliminar" class="modal">
    <div class="modal-content">
        <div class="container">
            <div class="modal-box">
                <span class="close" onclick="cerrarModalEliminar()">&times;</span>
                <div class="modal-content">
                    <div class="modal-body">
                        <h3 class="title">¡CUIDADO!</h3>
                        <p class="description"><h2>¿Estás seguro de eliminar este juego?</h2></p>
                        <div class="modal-icon">
                            <img src="./iconos/block-user.png" alt="icono" style="width: 110px; height: 110px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn4" id="confirmarEliminarBtn" onclick="eliminarProductoAJAX()"><span class="button-content">Sí</span></button>
        <button class="btn4" onclick="cerrarModalEliminar()"><span class="button-content">No</span></button>
    </div>
</div>

<script>
    function abrirModalEditar(id) {
        document.getElementById('modalEditar').style.display = 'block';
        document.getElementById('edit-id').value = id;
        obtenerDatosProducto(id);
    }

    function cerrarModalEditar() {
        document.getElementById('modalEditar').style.display = 'none';
    }

    function obtenerDatosProducto(id) {
        // Hacer una solicitud AJAX al servidor para obtener los datos del producto
        // Tu implementación AJAX para obtener los datos del producto aquí
    }

    function abrirModalEliminar(id) {
        document.getElementById('modalEliminar').style.display = 'block';
        eliminarProducto(id);
    }

    function eliminarProducto(id) {
        document.getElementById('confirmarEliminarBtn').setAttribute('data-id-producto', id);
    }

    function eliminarProductoAJAX() {
        // Tu implementación AJAX para eliminar el producto aquí
    }

    function cerrarModalEliminar() {
        document.getElementById('modalEliminar').style.display = 'none';
    }
</script>

    </div>
</div>
