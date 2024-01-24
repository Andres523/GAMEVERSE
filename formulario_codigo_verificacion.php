
<!DOCTYPE html>
<html>
<head>
    <title>Verificación de código</title>
</head>
<body>
    <h2>Verificación de Código</h2>
    <form method="post" action="procesar_datos.php">
        <div class="user-box">
            <label for="codigoVerificacion"><h3>Ingrese el código de verificación recibido:</h3></label>
            <input class="input" type="text" id="codigoVerificacion" name="codigoVerificacion" required>
        </div>
        <button class="btn4" type="submit" name="verificarCodigo">Verificar código</button>
    </form>
</body>
</html>
