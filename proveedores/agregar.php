
<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    
    // Validaciones básicas
    if (empty($nombre)) {
        $error = "El nombre es obligatorio";
    } else {
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "pp2025");
        
        // Verificar conexión
        if ($conexion->connect_error) {
            $error = "Error de conexión: " . $conexion->connect_error;
        } else {
            // Insertar proveedor
            $sql = "INSERT INTO proveedores (nombre, direccion, telefono) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sss", $nombre, $direccion, $telefono);
            
            if ($stmt->execute()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                $error = "Error al agregar proveedor: " . $conexion->error;
            }
            $stmt->close();
            $conexion->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor - Nissi Creaciones</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <?php 
    include '../includes/header.php'; 
    if (function_exists('mostrarRibbon')) {
        mostrarRibbon("proveedores");
    }
    ?>
    
    <div class="main-container">
        <div class="toolbar">
            <a href="index.php" class="button">← Volver</a>
            <h2>Nissi Creaciones</h2>
            <div></div>
        </div>

        <div class="form-container">
            <h2>Agregar Nuevo Proveedor</h2>
            
            <?php 
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre del Proveedor:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="button highlight">Guardar Proveedor</button>
                    <a href="index.php" class="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>