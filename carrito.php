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
                    <th class="first">imagen</th>
                    <th class="second">cantidad</th>
                    <th class="third">nombre</th>
                    <th class="fourth">precio </th>
                    <th class="fifth">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
           
            <tbody>
              <form action="comprar_carrito.php" method="post">
                  <?php
                  $totalInicial = 0; // Inicializar el total inicial

                  if ($resultado_carrito && mysqli_num_rows($resultado_carrito) > 0) {
                      while ($fila = mysqli_fetch_assoc($resultado_carrito)) {
                          // Sumar el precio de cada juego al total inicial
                          $totalInicial += $fila['precio'];
                          ?>
                        <tr class="productitm">
                            <td><img src="<?php echo $fila['imagen']; ?>" class="thumb"></td>
                            <td>
                            <input type="number" value="1" min="1" max="<?php echo $fila['cantidad']; ?>" class="qtyinput" id="qty_<?php echo $fila['id']; ?>" name="cantidad[]" onchange="actualizarPrecio(<?php echo $fila['id']; ?>)">

                            </td>
                            <td><?php echo $fila['nombre']; ?></td>
                            <td id="precio_unitario_<?php echo $fila['id']; ?>" style="display:none"><?php echo $fila['precio']; ?></td>
                            <td id="precio_total_<?php echo $fila['id']; ?>"><?php echo $fila['precio']; ?></td>
                            <td>    <span class="remove"><a href="eliminar_carrito.php?id=<?php echo $fila['id']; ?>"><img src="https://i.imgur.com/h1ldGRr.png" alt="X"></a></span></td>
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
                                <td class="light" colspan="3">Total:</td>
                                <td colspan="2" id="total">$' . number_format($totalInicial, 2) . '</td>
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
                              <td colspan="2"><input type="text" name="ubicacion" placeholder="Ubicación" value="<?php echo htmlspecialchars($ubicacionUsuario); ?> " required></td>
                              <td colspan="3"><input type="text" name="direccion" placeholder="Dirección" value="<?php echo htmlspecialchars($direccionUsuario); ?>" required></td>
                          </tr>
                          <?php
                          mysqli_close($conexion);
                          ?>



                          <tr class="acceptterms">
                              <td colspan="5">
                                  <label>
                                     
                                  <input type="checkbox" name="confirmar" value="1" required>
                                    <label for="confirmar"> Acepto los términos y condiciones</label>
                                     
                                  </label>
                              </td>
                          </tr>


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
    @import url(https://fonts.googleapis.com/css?family=Fredoka+One);

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { overflow-y: scroll; }
body {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #414141;
  background: #caccf7 url('https://i.imgur.com/Syv2IVk.png'); /* https://subtlepatterns.com/old-map/ */
  padding: 25px 0;
}

::selection { background: #bdc0e8; }
::-moz-selection { background: #bdc0e8; }
::-webkit-selection { background: #bdc0e8; }

br { display: block; line-height: 1.6em; } 

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

input, textarea { 
  -webkit-font-smoothing: antialiased;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none; 
}
.userlocation input[type="text"] {
    width: 60%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
}


blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong, b { font-weight: bold; }
em, i { font-style: italic; }

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 {
  font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
  color: #fff;
  text-shadow: 1px 2px 0 #7184d8;
  font-size: 3.5em;
  line-height: 1.1em;
  padding: 6px 0;
  font-weight: normal;
  text-align: center;
}


/* page structure */
#w {
  display: block;
  width: 600px;
  margin: 0 auto;
}

#title {
  display: block;
  width: 100%;
  background: #95a6d6;
  padding: 10px 0;
  -webkit-border-top-right-radius: 6px;
  -webkit-border-top-left-radius: 6px;
  -moz-border-radius-topright: 6px;
  -moz-border-radius-topleft: 6px;
  border-top-right-radius: 6px;
  border-top-left-radius: 6px;
}

#page {
  display: block;
  background: #fff;
  padding: 15px 0;
  -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
  -moz-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
}

/** cart table **/
#cart {
  display: block;
  border-collapse: collapse;
  margin: 0;
  width: 100%;
  font-size: 1.2em;
  color: #444;
}
#cart thead th {
  padding: 8px 0;
  font-weight: bold;
}

#cart thead th.first {
  width: 175px;
}

#cart thead th.third {
  width: 230px;
}
#cart thead th.fourth {
  width: 130px;
}
#cart thead th.fifth {
  width: 20px;
}

#cart tbody td {
  text-align: center;
  margin-top: 4px;
}

tr.productitm {
  height: 65px;
  line-height: 65px;
  border-bottom: 1px solid #d7dbe0;
}


#cart tbody td img.thumb {
  vertical-align: bottom;
  border: 1px solid #ddd;
  margin-bottom: 4px;
}

.qtyinput {
  width: 33px;
  height: 22px;
  border: 1px solid #a3b8d3;
  background: #dae4eb;
  color: #616161;
  text-align: center;
}

tr.totalprice, tr.extracosts {
  height: 35px;
  line-height: 35px;
}
tr.extracosts {
  background: #e4edf4;
}

.remove {
  /* http://findicons.com/icon/261449/trash_can?id=397422 */
  cursor: pointer;
  position: relative;
  right: 12px;
  top: 5px;
}


.light {
  color: #888b8d;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.45);
  font-size: 1.1em;
  font-weight: normal;
}
.thick {
  color: #272727;
  font-size: 1.7em;
  font-weight: bold;
}


/** submit btn **/
tr.checkoutrow {
  background: #cfdae8;
  border-top: 1px solid #abc0db;
  border-bottom: 1px solid #abc0db;
}
td.checkout {
  padding: 12px 0;
  padding-top: 20px;
  width: 100%;
  text-align: right;
}


/* https://codepen.io/guvootes/pen/eyDAb */
#submitbtn {
  width: 150px;
  height: 35px;
  outline: none;
  border: none;
  border-radius: 5px;
  margin: 0 0 10px 0;
  font-size: 1.3em;
  letter-spacing: 0.05em;
  font-family: Arial, Tahoma, sans-serif;
  color: #fff;
  text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
  cursor: pointer;
  overflow: hidden;
  border-bottom: 1px solid #0071ff;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #66aaff), color-stop(100%, #4d9cff));
  background-image: -webkit-linear-gradient(#66aaff, #4d9cff);
  background-image: -moz-linear-gradient(#66aaff, #4d9cff);
  background-image: -o-linear-gradient(#66aaff, #4d9cff);
  background-image: linear-gradient(#66aaff, #4d9cff);
}
#submitbtn:hover {
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #4d9cff), color-stop(100%, #338eff));
  background-image: -webkit-linear-gradient(#4d9cff, #338eff);
  background-image: -moz-linear-gradient(#4d9cff, #338eff);
  background-image: -o-linear-gradient(#4d9cff, #338eff);
  background-image: linear-gradient(#4d9cff, #338eff);
}
#submitbtn:active {
  border-bottom: 0;
  background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #338eff), color-stop(100%, #4d9cff));
  background-image: -webkit-linear-gradient(#338eff, #4d9cff);
  background-image: -moz-linear-gradient(#338eff, #4d9cff);
  background-image: -o-linear-gradient(#338eff, #4d9cff);
  background-image: linear-gradient(#338eff, #4d9cff);
  -webkit-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
  -moz-box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
  box-shadow: inset 0 1px 3px 1px rgba(0,0,0,0.25);
}
</style>
