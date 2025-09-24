<?php
// eliminar.php - Elimina un ventas por cod_ventas
$conexion = new mysqli('localhost', 'root', '', 'pp2025');
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

if (!isset($_GET['cod_venta'])) {
    die('Código de venta no especificado.');
}

$cod_ventas = $conexion->real_escape_string($_GET['cod_ventas']);
$sql = "DELETE FROM ventas WHERE cod_ventas='$cod_ventas'";
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
    <title>Eliminar producto</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
    <div class="form-container">
        <?php if (isset($mensaje)) echo $mensaje; ?>
        <a href="index.php" class="button highlight">Volver a productos</a>
    </div>
</body>

</html>
