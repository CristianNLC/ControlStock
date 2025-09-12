
<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $punto_pedido = $_POST['punto_pedido'];
    $cod_prov = $_POST['cod_prov'];
    
    // Validaciones básicas
    if (empty($nombre) || empty($punto_pedido) || empty($cod_prov)) {
        $error = "Todos los campos obligatorios deben ser completados";
    } else {
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "pp2025");
        
        // Verificar conexión
        if ($conexion->connect_error) {
            $error = "Error de conexión: " . $conexion->connect_error;
        } else {
            // Insertar insumo
            $sql = "INSERT INTO insumos (nombre, punto_pedido, cod_prov) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sii", $nombre, $punto_pedido, $cod_prov);
            
            if ($stmt->execute()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                $error = "Error al agregar insumo: " . $conexion->error;
            }
            $stmt->close();
            $conexion->close();
        }
    }
}

// Obtener proveedores para el select
$conexion = new mysqli("localhost", "root", "", "pp2025");
$proveedores = $conexion->query("SELECT cod_prov, nombre FROM proveedores ORDER BY nombre");
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Insumo - Nissi Creaciones</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <?php 
    include '../includes/header.php'; 
    if (function_exists('mostrarRibbon')) {
        mostrarRibbon("insumos");
    }
    ?>
    
    <div class="main-container">
        <div class="toolbar">
            <a href="index.php" class="button">← Volver</a>
            <h2>Nissi Creaciones</h2>
            <div></div>
        </div>

        <div class="form-container">
            <h2>Agregar Nuevo Insumo</h2>
            
            <?php 
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre del Insumo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="punto_pedido">Punto de Pedido:</label>
                    <input type="number" id="punto_pedido" name="punto_pedido" min="0" required>
                </div>
                
                <div class="form-group">
                    <label for="cod_prov">Proveedor:</label>
                    <select id="cod_prov" name="cod_prov" required>
                        <option value="">Seleccionar proveedor</option>
                        <?php while($proveedor = $proveedores->fetch_assoc()): ?>
                            <option value="<?php echo $proveedor['cod_prov']; ?>"><?php echo $proveedor['nombre']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="button highlight">Guardar Insumo</button>
                    <a href="index.php" class="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>