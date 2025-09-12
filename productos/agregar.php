
<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    // Validaciones básicas
    if (empty($nombre) || empty($precio)) {
        $error = "Todos los campos obligatorios deben ser completados";
    } else {
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "pp2025");
        
        // Verificar conexión
        if ($conexion->connect_error) {
            $error = "Error de conexión: " . $conexion->connect_error;
        } else {
            // Insertar producto
            $sql = "INSERT INTO productos (nombre, precio) VALUES (?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("sd", $nombre, $precio);
            
            if ($stmt->execute()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                $error = "Error al agregar producto: " . $conexion->error;
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
    <title>Agregar Producto - Nissi Creaciones</title>
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
    <?php 
    include '../includes/header.php'; 
    if (function_exists('mostrarRibbon')) {
        mostrarRibbon("productos");
    }
    ?>
    
    <div class="main-container">
        <div class="toolbar">
            <a href="index.php" class="button">← Volver</a>
            <h2>Nissi Creaciones</h2>
            <div></div>
        </div>

        <div class="form-container">
            <h2>Agregar Nuevo Producto</h2>
            
            <?php 
            if (isset($error)) {
                echo "<div class='error'>$error</div>";
            } 
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                echo "<div class='success'>Producto agregado correctamente</div>";
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" required>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="button highlight">Guardar Producto</button>
                    <a href="index.php" class="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>