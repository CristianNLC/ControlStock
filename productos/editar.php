<?php
// editar.php - Formulario para editar producto
$conexion = new mysqli('localhost', 'root', '', 'pp2025');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

if (!isset($_GET['cod_producto'])) {
    die('Código de producto no especificado.');
}

$cod_producto = $conexion->real_escape_string($_GET['cod_producto']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $precio = $conexion->real_escape_string($_POST['precio']);
    $sql = "UPDATE productos SET nombre='$nombre', precio='$precio' WHERE cod_producto='$cod_producto'";
    if ($conexion->query($sql)) {
        $mensaje = '<div class="alert-success">Producto actualizado correctamente.</div>';
    } else {
        $mensaje = '<div class="alert-error">Error al actualizar: ' . $conexion->error . '</div>';
    }
}

$sql = "SELECT * FROM productos WHERE cod_producto='$cod_producto'";
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
        <h2>Editar producto</h2>
        <form method="POST">


            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>

            <label for="precio">Precio:</label>
            <input type="number" step="0.01" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>

            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</body>

</html>
