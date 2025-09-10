<?php
// eliminar.php - Elimina un producto por cod_producto
$conexion = new mysqli('localhost', 'root', '', 'pp2025');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

if (!isset($_GET['cod_vendedor'])) {
    die('Código de vendedor no especificado.');
}

$cod_vendedor = $conexion->real_escape_string($_GET['cod_vendedor']);
$sql = "DELETE FROM vendedores WHERE cod_vendedor='$cod_vendedor'";
if ($conexion->query($sql)) {
    $mensaje = '<div class="alert-success">Producto eliminado correctamente.</div>';
} else {
    $mensaje = '<div class="alert-error">Error al eliminar: ' . $conexion->error . '</div>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar vendedor</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
    <div class="form-container">
        <?php if (isset($mensaje)) echo $mensaje; ?>
        <a href="index.php" class="button highlight">Volver a vendedores</a>
    </div>
</body>

</html>
