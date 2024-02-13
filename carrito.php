<?php
session_start();

if(isset($_SESSION['nombreUsuario'])) {
    $nombreUsuario = $_SESSION['nombreUsuario'];

    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $loggedIn = true;

    // Consulta para obtener los juegos en el carrito del usuario
    $consulta_carrito = "SELECT p.id, p.nombre, p.descripcion, p.requisitos, p.precio, p.imagen, p.video_mp4, c.id as categoria_id, c.nombre as categoria_nombre, p.cantidad
    FROM productos p
    LEFT JOIN categorias c ON p.categoria = c.id
    INNER JOIN carrito car ON p.id = car.id_producto
    INNER JOIN usuarios u ON car.id_usuario = u.id
    WHERE u.nombre = ?";


    $stmt_carrito = mysqli_prepare($conexion, $consulta_carrito);
    mysqli_stmt_bind_param($stmt_carrito, "s", $nombreUsuario);
    mysqli_stmt_execute($stmt_carrito);
    $resultado_carrito = mysqli_stmt_get_result($stmt_carrito);

} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Confirmar Compra</title>
    <!-- mari  tus estilos CSS   -->
</head>
<body>
    

<div id="w">
    <header id="title">
        <h1>Carrito</h1>
    </header>
    <div id="page">
        <table id="cart">
            <thead>
                <tr>
                    <th>imagen</th>
                    <th>cantidad</th>
                    <th>nombre</th>
                    <th>precio </th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
           
            <tbody>
              <form action="comprar_carrito.php" method="post">
                  <?php
                  $totalInicial = 0;

                  if ($resultado_carrito && mysqli_num_rows($resultado_carrito) > 0) {
                      while ($fila = mysqli_fetch_assoc($resultado_carrito)) {
                          // Sumar el precio de cada juego al total inicial
                          $totalInicial += $fila['precio'];
                          ?>
                        <tr class="productitm">
                            <td><img src="<?php echo $fila['imagen']; ?>" class="thumb"></td>
                            <td>
                            <input class="su" type="number" value="1" min="1" max="<?php echo $fila['cantidad']; ?>" id="qty_<?php echo $fila['id']; ?>" name="cantidad[]" onchange="actualizarPrecio(<?php echo $fila['id']; ?>)">

                            </td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td id="precio_unitario_<?php echo $fila['id']; ?>" style="display:none"><?php echo $fila['precio']; ?></td>
                            <td id="precio_total_<?php echo $fila['id']; ?>"><?php echo $fila['precio']; ?></td>
                            <td><span><a href="eliminar_carrito.php?id=<?php echo $fila['id']; ?>"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></a></span></td>
                        </tr>  
                        <input type="hidden" name="id_juego[]" value="<?php echo $fila['id']; ?>">
                        <input type="hidden" name="nombre_juego[]" value="<?php echo $fila['nombre']; ?>">
    <?php
        }
    } else {
        echo '<tr><td colspan="5">No hay juegos en tu carrito.</td></tr>';
    }
    ?>
    <?php
                          echo '<tr class="totalprice">
                                <th colspan="3">Total:</th>
                                <th colspan="2" id="total">$' . number_format($totalInicial, 2) . '</th>
                            </tr>';
                            ?>
                            <?php
                            // Consulta para obtener la ubicación del usuario
                            $consultaUbicacion = "SELECT ubicacion FROM usuarios WHERE nombre = ?";
                            $stmtUbicacion = mysqli_prepare($conexion, $consultaUbicacion);
                            mysqli_stmt_bind_param($stmtUbicacion, "s", $nombreUsuario);
                            mysqli_stmt_execute($stmtUbicacion);
                            $resultadoUbicacion = mysqli_stmt_get_result($stmtUbicacion);

                            if ($resultadoUbicacion && mysqli_num_rows($resultadoUbicacion) > 0) {
                                $filaUbicacion = mysqli_fetch_assoc($resultadoUbicacion);
                                $ubicacionUsuario = $filaUbicacion['ubicacion'];
                            } else {
                                $ubicacionUsuario = ''; 
                            }

                            // Consulta para obtener la dirección del usuario
                            $consultaDireccion = "SELECT direccion FROM usuarios WHERE nombre = ?";
                            $stmtDireccion = mysqli_prepare($conexion, $consultaDireccion);
                            mysqli_stmt_bind_param($stmtDireccion, "s", $nombreUsuario);
                            mysqli_stmt_execute($stmtDireccion);
                            $resultadoDireccion = mysqli_stmt_get_result($stmtDireccion);

                            if ($resultadoDireccion && mysqli_num_rows($resultadoDireccion) > 0) {
                                $filaDireccion = mysqli_fetch_assoc($resultadoDireccion);
                                $direccionUsuario = $filaDireccion['direccion'];
                            } else {
                                $direccionUsuario = ''; 
                            }
                            ?>
                            

                          <tr class="userlocation">
                              <td colspan="2"><input class="su" type="text" name="ubicacion" placeholder="Ubicación" value="<?php echo htmlspecialchars($ubicacionUsuario); ?> " required></td>
                              <td colspan="3"><input class="su" type="text" name="direccion" placeholder="Dirección" value="<?php echo htmlspecialchars($direccionUsuario); ?>" required></td>
                              <tr class="acceptterms">
                              <td colspan="5">
                              <center><label class="container" >
                                  <input checked="checked" type="checkbox" name="confirmar" value="1" required>
                                  <div class="checkmark"></div><label for="confirmar">Acepto los términos y condiciones</label>
                                  </label></center>
                              </td>
                          </tr>
                          </tr>
                          <?php
                          mysqli_close($conexion);
                          ?>

                          <tr class="checkoutrow">
                              <td colspan="5" class="checkout"><button id="submitbtn" name="comprar">Comprar</button></td>
                          </tr>
                </form>
            </tbody>
        </table>
    </div>
</div>


<script>
function actualizarTotal() {
    var total = 0;
    var productos = document.querySelectorAll('.productitm');
    productos.forEach(function(producto) {
        var precioTotalProducto = parseFloat(producto.querySelector('td[id^="precio_total_"]').innerText.replace('$', ''));
        total += precioTotalProducto;
    });
    document.getElementById('total').innerText = '$' + total.toFixed(2);
}

    function actualizarPrecio(idProducto) {
        var cantidad = parseInt(document.getElementById('qty_' + idProducto).value);
        var precioUnitario = parseFloat(document.getElementById('precio_unitario_' + idProducto).innerText);
        var precioTotal = cantidad * precioUnitario;
        document.getElementById('precio_total_' + idProducto).innerText = '$' + precioTotal.toFixed(2);

        actualizarTotal(); // Llama a esta función para recalcular el total
    }
</script>

</body>
</html>


<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 100px;
    background: #2d2f33;
}

.thumb{
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 2px solid black;
}
.su{
	font-weight: 500;
	font-size: 11px;
	color: #fff;
	background-color: rgb(28, 28, 30);
	border-radius: 4px;
	border: none;
	outline: none;
	padding: 8px;
	transition: 0.4s;
  }
  
  .su:hover {
	box-shadow: 0 0 0 2px rgba(135, 207, 235, 0.200);
  }
  
  .su:focus {
	box-shadow: 0 0 0 2px skyblue;
  }
#w {
    width: 80%;
    margin: 0 auto;
    background-color: #222528;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#title {
    text-align: center;
    margin-bottom: 20px;
    background: #5a03a1;
    padding: 1px;
    color: white;
}

#cart {
    width: 100%;
    border-collapse: collapse;
}

#cart th {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    color: white;
}
#cart td {
    padding: 10px;
    text-align: center; /* Añadido para centrar el contenido */
    color: white; /* Color de texto blanco */
}


.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.container {
  display: block;
  position: relative;
  cursor: pointer;
  font-size: 20px;
  user-select: none;
}

.checkmark {
  position: relative;
  top: 0;
  left: 0;
  height: 1.3em;
  width: 1.3em;
  border: 2px solid #414141;
  border-radius: 5px;
  transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
}

.container input:hover ~ .checkmark {
  border: 2px solid #0974f1;
}

.container input:checked ~ .checkmark {
  box-shadow: 0 0 20px rgba(9, 117, 241, 0.8);
  border: 2px solid #0974f1;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.container input:checked ~ .checkmark:after {
  display: block;
}

.container .checkmark:after {
  left: 0.45em;
  top: 0.25em;
  width: 0.25em;
  height: 0.5em;
  border: solid white;
  border-width: 0 0.15em 0.15em 0;
  transform: rotate(45deg);
}

.checkoutrow {
    text-align: center;
}

.checkout button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
}

.checkout button:hover {
    background-color: #45a049;
}

</style>
