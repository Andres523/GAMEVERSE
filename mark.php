<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/admin2.css">
     

    <link rel="shortcut icon" href="../img/logo.png">
    
</head>
<body>
<div class="spinner-overlay">
    <div class="spinner">
    


        <style>

        .spinner:before {
        transform: rotateX(60deg) rotateY(45deg) rotateZ(45deg);
        animation: 750ms rotateBefore infinite linear reverse;
        }

        .spinner:after {
        transform: rotateX(240deg) rotateY(45deg) rotateZ(45deg);
        animation: 750ms rotateAfter infinite linear;
        }

        .spinner:before,
        .spinner:after {
        box-sizing: border-box;
        content: '';
        display: block;
        position: absolute;
        margin-top: -5em;
        margin-left: -5em;
        width: 10em;
        height: 10em;
        transform-style: preserve-3d;
        transform-origin: 50%;
        transform: rotateY(50%);
        perspective-origin: 50% 50%;
        perspective: 300px;
        background-size: 10em 10em;
        background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+Cjxzdmcgd2lkdGg9IjI2NnB4IiBoZWlnaHQ9IjI5N3B4IiB2aWV3Qm94PSIwIDAgMjY2IDI5NyIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4bWxuczpza2V0Y2g9Imh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaC9ucyI+CiAgICA8dGl0bGU+c3Bpbm5lcjwvdGl0bGU+CiAgICA8ZGVzY3JpcHRpb24+Q3JlYXRlZCB3aXRoIFNrZXRjaCAoaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoKTwvZGVzY3JpcHRpb24+CiAgICA8ZGVmcz48L2RlZnM+CiAgICA8ZyBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBza2V0Y2g6dHlwZT0iTVNQYWdlIj4KICAgICAgICA8cGF0aCBkPSJNMTcxLjUwNzgxMywzLjI1MDAwMDM4IEMyMjYuMjA4MTgzLDEyLjg1NzcxMTEgMjk3LjExMjcyMiw3MS40OTEyODIzIDI1MC44OTU1OTksMTA4LjQxMDE1NSBDMjE2LjU4MjAyNCwxMzUuODIwMzEgMTg2LjUyODQwNSw5Ny4wNjI0OTY0IDE1Ni44MDA3NzQsODUuNzczNDM0NiBDMTI3LjA3MzE0Myw3NC40ODQzNzIxIDc2Ljg4ODQ2MzIsODQuMjE2MTQ2MiA2MC4xMjg5MDY1LDEwOC40MTAxNTMgQy0xNS45ODA0Njg1LDIxOC4yODEyNDcgMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IDE0NS4yNzczNDQsMjk2LjY2Nzk2OCBDMTQ1LjI3NzM0NCwyOTYuNjY3OTY4IC0yNS40NDkyMTg3LDI1Ny4yNDIxOTggMy4zOTg0Mzc1LDEwOC40MTAxNTUgQzE2LjMwNzA2NjEsNDEuODExNDE3NCA4NC43Mjc1ODI5LC0xMS45OTIyOTg1IDE3MS41MDc4MTMsMy4yNTAwMDAzOCBaIiBpZD0iUGF0aC0xIiBmaWxsPSIjMDAwMDAwIiBza2V0Y2g6dHlwZT0iTVNTaGFwZUdyb3VwIj48L3BhdGg+CiAgICA8L2c+Cjwvc3ZnPg==);
        }
        /* sitNSpin.less */
        @keyframes rotateBefore {
        from {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(0deg);
        }

        to {
            transform: rotateX(60deg) rotateY(45deg) rotateZ(-360deg);
        }
        }

        @keyframes rotateAfter {
        from {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(0deg);
        }

        to {
            transform: rotateX(240deg) rotateY(45deg) rotateZ(360deg);
        }
        }
            .spinner-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999; 
                display: none; 
            }


            .spinner {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);


            
            }


        </style>

        <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector('.spinner-overlay').style.display = 'block';
    });

    window.addEventListener('load', function() {
        document.querySelector('.spinner-overlay').style.display = 'none';
    });


    window.addEventListener('beforeunload', function(event) {
        
        document.querySelector('.spinner-overlay').style.display = 'none';
    });
        </script>

    </div>
</div>
<a href="./admin2.php" ><button class="btn4">Atrás</button></a>
    <main>
        <div class="login-box">
            <br>
            
        
            <input id="radio1" type="radio" name="css-tabs" checked>
            <input id="radio2" type="radio" name="css-tabs">
        
            <div id="tabs">
                <label id="tab2" for="radio1">Marketplace</label>
            </div>
 
            <div id="content">
            <section id="content1">
                    <h2>Marketplace</h2>
                    <button class="btn4" id="openModalBtn">Agregar Producto</button>
                    <br><br>
                    <?php
                    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                    if (!$conexion) {
                        die("Error de conexión: " . mysqli_connect_error());
                    }
                    
                    $consulta = "SELECT id, nombre, descripcion, cantidad, precio, imagen, tipo FROM marketplace";
                    
                    
                    if (isset($_GET['buscarNombre']) && !empty($_GET['buscarNombre'])) {
                        $nombreABuscar = $_GET['buscarNombre'];
                       
                        $consulta .= " WHERE nombre LIKE '%$nombreABuscar%'";
                    }
                    
                    $resultado = mysqli_query($conexion, $consulta);
                    
                   
                    
                    ?>
                    <form method="GET">
                        <div class='user-box'>
                            <label for="buscarNombre" >Buscar por Nombre:</label>
                            <input type="text" id="buscarNombre" name="buscarNombre">
                            <button type="submit" class="btn4">Buscar</button>
                            <br><br>
                        </div>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Obtener referencia al campo de búsqueda por nombre
                            var buscarNombreInput = document.getElementById('buscarNombre');
                        
                            // Agregar un evento 'input' que se activa cuando el usuario escribe en el campo de búsqueda
                            buscarNombreInput.addEventListener('input', function() {
                                // Obtener el valor del campo de búsqueda
                                var nombreABuscar = this.value.trim();
                            
                                // Crear una nueva solicitud XMLHttpRequest
                                var xhr = new XMLHttpRequest();
                            
                                // Configurar la función de callback que se ejecutará cuando la solicitud se complete
                                xhr.onreadystatechange = function() {
                                    if (xhr.readyState === XMLHttpRequest.DONE) {
                                        if (xhr.status === 200) {
                                            // Actualizar el contenido de la tabla con los resultados de la búsqueda
                                            document.getElementById('tablaProductos').innerHTML = xhr.responseText;
                                        } else {
                                            console.error('Error al realizar la solicitud AJAX');
                                        }
                                    }
                                };
                            
                                // Enviar una solicitud GET al servidor para buscar productos por nombre
                                xhr.open('GET', 'buscar_producto2.php?nombre=' + encodeURIComponent(nombreABuscar), true);
                                xhr.send();
                            });
                        });
                    
                                          
                    </script>


                                

                            <div class="">          
                                    <div id="tablaProductos" class="tab">    
                                    <?php
                                    $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                                    if (!$conexion) {
                                        die("Error de conexión: " . mysqli_connect_error());
                                    }
                                
                                    $consulta = "SELECT id, nombre, descripcion, cantidad, precio, imagen, tipo FROM marketplace";
                                    $resultado = mysqli_query($conexion, $consulta);
                                
                                    if (mysqli_num_rows($resultado) > 0) {
                                        echo '<table>';
                                        echo '<tr>
                                                <th>ID: </th>
                                                <th>Imagen: </th>
                                                <th>Nombre: </th>
                                                <th>Descripción: </th>
                                                <th>Cantidad: </th>
                                                <th>Precio: </th>
                                                <th>tipo: </th>
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
                                            echo '</td>';
                                            echo '<td>' . $fila['tipo'] .  '</td>';
                                            $tipo = $fila['tipo'];


                                            echo '<td> 
                                            <button class="edit-button" type="button" onclick="abrirModalEditar( ' . $fila['id'] . ')"><svg class="edit-svgIcon" viewBox="0 0 512 512">
                                            <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                                            </svg></button>

                                                    
                                            <button class="delete-button" type="button" onclick="abrirModalEliminar(' . $fila['id'] . ')">
                                            <svg class="delete-svgIcon" viewBox="0 0 448 512">
                                                <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                                            </svg>
                                        </button>
                                            </td>';
                                                  
                                            
                                                  
                                            
                                            echo '<tr>';
                                            echo '<td colspan="8"> <hr> </td>'; 
                                            echo '</tr>';
                                            
                                        
                                        }
                                        
                                        echo '</table>';
                                       
                                    } else {
                                        echo 'No hay productos disponibles.';
                                    }
                                    
                       
                                    
                                    ?>
                                   

                                </div>
                                
                                 <!-- MODAL editar-->

                                <div id="modalEditar" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="cerrarModalEditar()">&times;</span>
                                        <div class="container">
                                            <h2>Editar Producto</h2>
                                            <form id="formEditarProducto" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                                            <input type="hidden" id="edit-id" name="id">

                                            <label for="edit-nombre"></label>
                                            <input type="text" id="edit-nombre" name="nombre" placeholder="Nombre">

                                            <label for="edit-descripcion"></label>
                                            <textarea id="edit-descripcion" name="descripcion" placeholder="Descripción"></textarea>

                                            <label for="edit-cantidad"></label>
                                            <input type="number" id="edit-cantidad" name="cantidad" placeholder="Cantidad" >
                                            
                                            <label for="edit-precio"></label>
                                            <input type="number" id="edit-precio" name="precio" placeholder="Precio">
                                            
                                            <label for="edit-tipo">Tipo:</label>
                                            <select id="edit-tipo" name="tipo">
                                                <?php 
                                                if ($tipo == "posters")
                                                    echo '<option value="posters">posters</option>';
                                                    echo '<option value="consolas">Consolas</option>';
                                                    echo '<option value="figuras">Figuras</option>';
                                                
                                                    
                                                

                                                ?>

                                            </select>

                                            <label for="edit-imagen">Imagen</label>
                                            <input type="file" id="edit-imagen" name="imagen" accept="image/*">
                                            <br>
                                            <button type="submit">Guardar Cambios</button>
                                        
                                            
                                            <?php
                                            mysqli_close($conexion);
                                            ?>
                                            </form>
                                            <?php

                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                // Establecer la conexión a la base de datos
                                                $conexion = mysqli_connect("127.0.0.1", "root", "", "gameverse");

                                                // Verificar si la conexión fue exitosa
                                                if (!$conexion) {
                                                    die("Error de conexión: " . mysqli_connect_error());
                                                }
                                            
                                                // Obtener los datos del formulario
                                                $id = $_POST['id'];
                                                $nombre = $_POST['nombre'];
                                                $cantidad = $_POST['cantidad'];
                                                $descripcion = $_POST['descripcion'];
                                                $precio = $_POST['precio'];
                                                $tipo = $_POST['tipo'];
                                            
                                              
                                                $consulta = "UPDATE marketplace SET nombre='$nombre', descripcion='$descripcion', cantidad=$cantidad, precio=$precio, tipo='$tipo'";
                                                                                            
                                            
                                                // Actualizar la ruta de la imagen si se ha cargado un nuevo archivo
                                                if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                                                    $imagen_nombre = $_FILES['imagen']['name'];
                                                    $imagen_tmp = $_FILES['imagen']['tmp_name'];
                                                    $imagen_ruta = "./img/juegos/" . $imagen_nombre;
                                                    move_uploaded_file($imagen_tmp, $imagen_ruta);
                                                    // Actualizar la ruta de la imagen en la base de datos
                                                    $consulta .= ", imagen='$imagen_ruta'";
                                                }

                                                // Actualizar la ruta del video si se ha cargado un nuevo archivo

                                                // Agregar la condición WHERE a la consulta
                                                $consulta .= " WHERE id=$id";

                                                // Ejecutar la consulta
                                                if (mysqli_query($conexion, $consulta)) {
                                                    echo "<p>Los datos del producto han sido actualizados correctamente</p>";
                                                    // Redirigir al usuario a la misma página después de la actualización
                                                    echo "<script>window.location.href = window.location.href;</script>";
                                                    exit;
                                                } else {
                                                    echo "<p>Error al actualizar los datos del producto: " . mysqli_error($conexion) . "</p>";
                                                }

                                                // Cerrar la conexión a la base de datos
                                                mysqli_close($conexion);
                                            }

                                            ?>

                                           


                                        </div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    
                                        <script>
                                        

                                            function abrirModalEditar(id) {
                                                document.getElementById('modalEditar').style.display = 'block';
                                                document.getElementById('edit-id').value = id;
                                                obtenerDatosJuego(id);
                                                document.getElementById('modalEditar').style.display = 'block';
                                            }

                                            function cerrarModalEditar() {
                                                document.getElementById('modalEditar').style.display = 'none';
                                            }


                                            function obtenerDatosJuego(id) {
                                                // Hacer una solicitud AJAX al servidor para obtener los datos del juego
                                                $.ajax({
                                                    url: 'obtener_datos_juego2.php',
                                                    method: 'GET',
                                                    data: {id: id},
                                                    success: function(response) {
                                                        var juego = JSON.parse(response);
                                                        // Llenar los campos del formulario con los datos del juego
                                                        $('#edit-nombre').val(juego.nombre);
                                                        $('#edit-descripcion').val(juego.descripcion);
                                                        
                                                        $('#edit-cantidad').val(juego.cantidad);
                                                        $('#edit-precio').val(juego.precio);
                                                        $('#edit-imagen').val(juego.imagen);
                                                       
                                                        $('#edit-categoria').val(juego.categoria);

                                                        // Mostrar el modal después de llenar los campos del formulario
                                                        $('#modalEditar').css('display', 'block');
                                                    },
                                                    error: function(xhr, status, error) {
                                                        console.error('Error al obtener los datos del juego:', error);
                                                    }
                                                });
                                            }


                                   
                                        </script>
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
                                                        <center><h3 class="title">¡CUIDADO!</h3>
                                                        <p class="description"><h2>¿Estás seguro de eliminar este juego?</h2></p>
                                                        <div class="modal-icon">
                                                            <img src="./iconos/block-user.png" alt="icono" style="width: 110px; height: 110px;"></center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <center>
                                        <button class="btn4" id="confirmarEliminarBtn" onclick="eliminarProductoAJAX()"><span class="button-content">Sí</span></button>
                                        <button class="btn4" onclick="cerrarModalEliminar()"><span class="button-content">No</span></button></center>
                                        </div>
                                    </div>
                                    <script>
    function abrirModalEliminar(id) {
        document.getElementById('modalEliminar').style.display = 'block';
        eliminarProducto(id);
    }

    function eliminarProducto(id) {
        document.getElementById('confirmarEliminarBtn').setAttribute('data-id-producto', id);
    }

    function eliminarProductoAJAX() {
        const idProducto = document.getElementById('confirmarEliminarBtn').getAttribute('data-id-producto');
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log('Producto eliminado correctamente');
                    location.reload(); // Recargar la página después de eliminar el producto
                } else {
                    console.error('Error al eliminar el producto:', xhr.responseText);
                }
                cerrarModalEliminar(); // Cerrar el modal después de completar la eliminación
            }
        };
        xhr.open('POST', 'eliminar_juego2.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('id_producto=' + idProducto);
    }

    function cerrarModalEliminar() {
        document.getElementById('modalEliminar').style.display = 'none';
    }
</script>

                                </div>







                              
                            </div>


                                <!-- PRODUCTOS -->
                                <div id="productModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close" id="closeProductModalBtn">&times;</span>
                                        <form id="productForm" action="procesar_productoM.php" method="post"     enctype="multipart/form-data" >
                                            <br>
                                        <h1 class="ti">AGREGAR PRODUCTO</h1>
                                            <div class="form-container">
                                                <div class="form-column">
                                                <div class="column">
                                                    <label for="nombre"></label>
                                                    <input class="su" type="text" id="nombre" name="nombre" placeholder="Nombre" required="Complete este campo">

                                                    <label for="descripcion"></label>
                                                    <input class="su" type="text" id="descripcion" name="descripcion" placeholder="Descripción" required="Complete este campo">

                                                
                                                    <label for="cantidad"></label>
                                                    <input class="su" type="number" id="cantidad" name="cantidad" placeholder="Cantidad" required="Complete este campo">
                                                    
                                                    <label for="precio"></label>
                                                    <input class="su" type="number" id="precio" name="precio" placeholder="Precio" required="Complete este campo">
                                                    <br>

                                                    

                                                    <label for="tipo"></label>
                                                    <select class="su" id="tipo" name="tipo" required="required">
                                                        <option value="">Tipo</option>
                                                        <option value="posters">Posters</option>
                                                        <option value="consolas">Consolas</option>
                                                        <option value="figuras">Figuras</option>
                                                    </select>
                                                </div>
                                                <div class="column">
                                                    IMAGEN
                                                    <label for="imagen" class="button">
                                                      <span class="button__text">Agg Img</span>
                                                      <span class="button__icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg">
                                                          <line y2="19" y1="5" x2="12" x1="12"></line>
                                                          <line y2="12" y1="12" x2="19" x1="5"></line>
                                                        </svg>
                                                      </span>
                                                    </label>
                                                    <input class="button" type="file" id="imagen" name="imagen" accept="image/*" style="display: none;">
                                                    <button class="btn4" type="submit" name="guardarProducto">Guardar Producto</button>
                                                </div>    
                                            </div>
                                            </form>



                                            <script>

                                                var openModalBtn = document.getElementById('openModalBtn');
                                                var closeProductModalBtn = document.getElementById('closeProductModalBtn');
                                                var productModal = document.getElementById('productModal');

                                                openModalBtn.addEventListener('click', function() {
                                                    productModal.style.display = 'block';
                                                });
                                                
                                                closeProductModalBtn.addEventListener('click', function() {
                                                    productModal.style.display = 'none';
                                                });
                                                
                                             
                                                window.addEventListener('click', function(event) {
                                                    if (event.target == productModal) {
                                                        productModal.style.display = 'none';
                                                    }
                                                });
                                                </script>
                                        </form>
                                    </div>   
                                </div>


            </section>
            </div>
        </div>


    </main>
</body>
</html>



