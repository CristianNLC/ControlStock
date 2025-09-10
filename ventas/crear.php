<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar producto</title>
    <link rel="stylesheet" href="../styles/styles.css" />
</head>

<body>
    <?php
    // Conexión a la base de datos (ajusta los datos si es necesario)
    $conexion = new mysqli('localhost', 'root', '', 'pp2025');
    if ($conexion->connect_error) {
        die('Error de conexión: ' . $conexion->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fecha_venta = $conexion->real_escape_string($_POST['fecha_venta']);
        $cod_vendedor = $conexion->real_escape_string($_POST['cod_vendedor']);
        $metodo_pago = $conexion->real_escape_string($_POST['metodo_pago']);
        $estado_pago = $conexion->real_escape_string($_POST['estado_pago']);


        $sql = "INSERT INTO ventas (fecha_venta, cod_vendedor, estado_pago)
        VALUES ('$fecha_venta', '$cod_vendedor', '$estado_pago')";

        if ($conexion->query($sql)) {
            $mensaje = '<div class="alert-success">Producto agregado correctamente.</div>';
        } else {
            $mensaje = '<div class="alert-error">Error al agregar producto: ' . $conexion->error . '</div>';
        }
    }
    ?>

    <div class="form-container">
        <?php if (isset($mensaje)) echo $mensaje; ?>
        <h2>Agregar nueva venta</h2>
        <form method="POST" action="">

            <label for="cod_vendedor">Vendedor:</label>
            <select name="cod_vendedor" required>
                <?php
                $res = $conexion->query("SELECT cod_vendedor, nombre FROM vendedores");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['cod_vendedor']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <label for="Fecha_Venta">Fecha de la venta:</label>
            <input type="date" name="fecha_venta" required>


            <label for="metodo_pago">Estado de pago:</label>
            <select name="metodo_pago" required>
                <?php
                $res = $conexion->query("SELECT cod_estado_pago, nombre FROM estados_de_pago");
                while ($row = $res->fetch_assoc()) {
                    echo "<option value='{$row['cod_estado_pago']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>

            <label for="estado_pago">Estado del Pago</label>
            <input type="text">

            <button type="submit">Agregar producto</button>
        </form>
    </div>
</body>

</html>
