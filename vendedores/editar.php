<?php
// editar.php - Formulario para editar vendedores
$conexion = new mysqli('localhost', 'root', '', 'pp2025');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

if (!isset($_GET['cod_vendedor'])) {
    die('Código de vendedor no especificado.');
}

$cod_vendedor = $conexion->real_escape_string($_GET['cod_vendedor']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $sql = "UPDATE vendedores SET nombre='$nombre' WHERE cod_vendedor='$cod_vendedor'";
    if ($conexion->query($sql)) {
        $mensaje = '<div class="alert-success">Producto actualizado correctamente.</div>';
    } else {
        $mensaje = '<div class="alert-error">Error al actualizar: ' . $conexion->error . '</div>';
    }
}

$sql = "SELECT * FROM vendedores WHERE cod_vendedor='$cod_vendedor'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows === 0) {
    die('Producto no encontrado.');
}
$producto = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
    <div class="form-container">
        <?php if (isset($mensaje)) echo $mensaje; ?>
        <h2>Editar vendedor</h2>

        <form method="POST">


            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre">

            <button type="submit">Guardar cambios</button>

            <a href="index.php" class="button highlight">Volver a vendedores</a>


        </form>
    </div>

</body>

</html>
