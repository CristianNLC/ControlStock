
<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha_venta = $_POST['fecha_venta'];
    $vendedor_id = $_POST['vendedor_id'];
    $metodo_pago_id = $_POST['metodo_pago_id'];
    $estado_entrega = $_POST['estado_entrega'];
    
    // Validaciones básicas
    if (empty($fecha_venta) || empty($vendedor_id) || empty($metodo_pago_id)) {
        $error = "Todos los campos obligatorios deben ser completados";
    } else {
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "pp2025");
        
        // Verificar conexión
        if ($conexion->connect_error) {
            $error = "Error de conexión: " . $conexion->connect_error;
        } else {
            // Insertar venta
            $sql = "INSERT INTO ventas (fecha_venta, vendedor_id, metodo_pago_id, estado_entrega) VALUES (?, ?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("siis", $fecha_venta, $vendedor_id, $metodo_pago_id, $estado_entrega);
            
            if ($stmt->execute()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                $error = "Error al agregar venta: " . $conexion->error;
            }
            $stmt->close();
            $conexion->close();
        }
    }
}

// Obtener vendedores y métodos de pago para los select
$conexion = new mysqli("localhost", "root", "", "pp2025");
$vendedores = $conexion->query("SELECT id, nombre FROM vendedores ORDER BY nombre");
$metodos_pago = $conexion->query("SELECT id, nombre FROM metodos_pago ORDER BY nombre");
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Venta - Nissi Creaciones</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <?php 
    include '../includes/header.php'; 
    if (function_exists('mostrarRibbon')) {
        mostrarRibbon("ventas");
    }
    ?>
    
    <div class="main-container">
        <div class="toolbar">
            <a href="index.php" class="button">← Volver</a>
            <h2>Nissi Creaciones</h2>
            <div></div>
        </div>

        <div class="form-container">
            <h2>Registrar Nueva Venta</h2>
            
            <?php 
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="fecha_venta">Fecha de Venta:</label>
                    <input type="date" id="fecha_venta" name="fecha_venta" required value="<?php echo date('Y-m-d'); ?>">
                </div>
                
                <div class="form-group">
                    <label for="vendedor_id">Vendedor:</label>
                    <select id="vendedor_id" name="vendedor_id" required>
                        <option value="">Seleccionar vendedor</option>
                        <?php while($vendedor = $vendedores->fetch_assoc()): ?>
                            <option value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="metodo_pago_id">Método de Pago:</label>
                    <select id="metodo_pago_id" name="metodo_pago_id" required>
                        <option value="">Seleccionar método</option>
                        <?php while($metodo = $metodos_pago->fetch_assoc()): ?>
                            <option value="<?php echo $metodo['id']; ?>"><?php echo $metodo['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="estado_entrega">Estado de Entrega:</label>
                    <select id="estado_entrega" name="estado_entrega">
                        <option value="Pendiente">Pendiente</option>
                        <option value="En proceso">En proceso</option>
                        <option value="Terminado">Terminado</option>
                        <option value="Entregado">Entregado</option>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="button highlight">Registrar Venta</button>
                    <a href="index.php" class="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>