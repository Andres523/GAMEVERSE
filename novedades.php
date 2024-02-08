<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gameverse";
 
// Establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar la eliminación si se recibió un ID de novedad para eliminar
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $sqlEliminar = "DELETE FROM novedades WHERE id = $idEliminar";

    if ($conn->query($sqlEliminar) === TRUE) {
        echo "Novedad eliminada correctamente";
    } else {
        echo "Error al eliminar la novedad: " . $conn->error;
    }
}

// Obtener el último ID de la tabla novedades
$sql_last_id = "SELECT MAX(id) AS max_id FROM novedades";
$result_last_id = $conn->query($sql_last_id);
$row_last_id = $result_last_id->fetch_assoc();
$max_id = $row_last_id['max_id'];

// Verificar si hay algún registro en la tabla novedades
if ($max_id === null) {
    $next_id = 1;
} else {
    $next_id = $max_id + 1;
}

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);

    // Subir imagen
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $imagen_destino = "./img_novedades/" . $imagen; 

    move_uploaded_file($imagen_temp, $imagen_destino);

 
    $sql = "INSERT INTO novedades (id, nombre, img, descripcion) VALUES ('$next_id', '$nombre', '$imagen_destino', '$descripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "Novedad agregada correctamente";
    } else {
        echo "Error al agregar la novedad: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet"/>
    
    <title>Agregar y Administrar Novedades - Gameverse</title>
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
    <br>
    <a class="btn4" href="index.php"> Volver</a>

<div class="box">
    <div class="orden">
        <div class="columna">
            <h1>Agregar Nueva Novedad</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre"><br>
            <br><br>
            <label for="imagen">Importar Imagen: </label>
            <br><br>
            <div class="input-div">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor" class="icon"><polyline points="16 16 12 12 8 16"></polyline><line y2="21" x2="12" y1="12" x1="12"></line><path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path><polyline points="16 16 12 12 8 16"></polyline></svg>
            <input class="input" type="file" id="imagen" name="imagen"><br>
            </div>
            </div>
        <div class="columna">
            <br><br><br><br>        
            <label for="descripcion">Descripción:</label><br>
            <textarea id="descripcion" name="descripcion" rows="4" cols="50"></textarea><br>
            <button class="btn4" type="submit" value="Agregar Novedad">Agregar Novedad</button>
        </div>
        </form>
    </div>
</div>
<br>
<br>
    <h1>Administrar Novedades</h1>
    <h3>Novedades</h3>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM novedades";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td><img src='" . $row['img'] . "' alt='" . $row['nombre'] . "' width='100'></td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td><a href='?eliminar=" . $row['id'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay novedades</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>


<style>


.btn4 {
  --border-color: linear-gradient(-45deg, #ffae00, #7e03aa, #00fffb);
  --border-width: .125em;
  --curve-size: .5em;
  --blur: 30px;
  --bg: #080312;
  --color: #afffff;
  color: var(--color);
  position: relative;
  isolation: isolate;
  display: inline-grid;
  place-content: center;
  padding: .5em 1.5em;
  font-size: 17px;
  border: 0;
  text-transform: uppercase;
  box-shadow: 10px 10px 20px rgba(0, 0, 0, .6);
  clip-path: polygon(
            0% var(--curve-size),

            var(--curve-size) 0,

            100% 0,
            100% calc(100% - var(--curve-size)),


            calc(100% - var(--curve-size)) 100%,

            0 100%);
  transition: color 250ms;
}

.btn4::after,
.btn4::before {
  content: '';
  position: absolute;
  inset: 0;
}

.btn4::before {
  background: var(--border-color);
  background-size: 300% 300%;
  animation: move-bg7234 5s ease infinite;
  z-index: -2;
}

@keyframes move-bg7234 {
  0% {
    background-position: 31% 0%
  }

  50% {
    background-position: 70% 100%
  }

  100% {
    background-position: 31% 0%
  }
}

.btn4::after {
  background: var(--bg);
  z-index: -1;
  clip-path: polygon(
            /* Top-left */
            var(--border-width) 
            calc(var(--curve-size) + var(--border-width) * .5),

            calc(var(--curve-size) + var(--border-width) * .5) var(--border-width),

            /* top-right */
            calc(100% - var(--border-width)) 
            var(--border-width),

            calc(100% - var(--border-width)) 
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),

            /* bottom-right 1 */
            calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) calc(100% - var(--border-width)),
            /* bottom-right 2 */
            var(--border-width) calc(100% - var(--border-width)));
  transition: clip-path 500ms;
}

.btn4:where(:hover, :focus)::after {
  clip-path: polygon(
                /* Top-left */
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5)),
    
                calc(100% - var(--border-width))

                var(--border-width),
    
                /* top-right */
                calc(100% - var(--border-width))

                 var(--border-width),
    
                calc(100% - var(--border-width)) 

                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)),
    
                /* bottom-right 1 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * .5)) 
                calc(100% - var(--border-width)),

                /* bottom-right 2 */
                calc(100% - calc(var(--curve-size) + var(--border-width) * 0.5))
                calc(100% - var(--border-width)));
  transition: 200ms;
}

.btn4:where(:hover, :focus) {
  color: #fff;
}

.input-div {
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid #8803f4;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  box-shadow: 0px 0px 25px #8803f4, inset 0px 0px 10px #8803f4, 0px 0px 5px #ffffff;
}

.input-div:hover {
  animation: flicker 2s linear infinite;
}

.icon {
  color: #8803f4;
  font-size: 1rem;
  cursor: pointer;
  opacity: 0.5;
}

.input-div:hover .icon {
  animation: iconflicker 2s linear infinite;
}

.input {
  position: absolute;
  opacity: 0;
  width: 50%;
  height: 50%;
  cursor: pointer !important;
}

@keyframes flicker {
  0% {
    border: 2px solid #8803f4;
    box-shadow: 0px 0px 30px #8803f4, inset 0px 0px 10px #8803f4, 0px 0px 50px #ffffff;
  }

  5% {
    border: none;
    box-shadow: none;
  }

  10% {
    border: 2px solid #8803f4;
    box-shadow: 0px 0px 30px #8803f4, inset 0px 0px 10px #8803f4, 0px 0px 5px #ffffff;
  }

  25% {
    border: none;
    box-shadow: none;
  }

  30% {
    border: 2px solid #8803f4;
    box-shadow: 0px 0px 30px #8803f4, inset 0px 0px 10px #8803f4, 0px 0px 5px #ffffff;
  }

  100% {
    border: 2px solid #8803f4;
    box-shadow: 0px 0px 30px #8803f4, inset 0px 0px 10px #8803f4, 0px 0px 5px #ffffff;
  }
}

@keyframes iconflicker {
  0% {
    opacity: 1;
  }

  5% {
    opacity: 0.2;
  }

  10% {
    opacity: 1;
  }

  25% {
    opacity: 0.2;
  }

  30% {
    opacity: 1;
  }

  100% {
    opacity: 1;
  }
}





.box {  
    padding: 30px;
    background-color: #141e30;
    color: #fff;
    justify-content: center;
    align-items: flex-start;
    border-bottom: 1px solid #fff;
}

.orden {
    display: flex;
    align-items: flex-start;
    margin-right: 10%;
    justify-content: space-around;
}

.spinner-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999; 
    background-color: #141e30; /* Cambio de color de fondo */
    display: none; 
}

.spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

body {
    margin: 15px;
    padding: 30px;
    background-color: #243b55;
    color: #fff;
}

h1 {
    color: #8803f4; /* Cambio de color de texto */
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #fff;
}

tr:nth-child(even) {
    background-color: #141e30; /* Cambio de color de fondo de fila par */
}

label {
    color: #8803f4; /* Cambio de color de texto de etiqueta */
}

input[type="text"], textarea {
    background-color: #243b55;
    color: #fff;
    border: 1px solid #8803f4;
}


</style>