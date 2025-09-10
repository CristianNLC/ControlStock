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
        $nombre = $conexion->real_escape_string($_POST['nombre']);



        $sql = "INSERT INTO vendedores ( nombre )
        VALUES ( '$nombre')";

        if ($conexion->query($sql)) {
            $mensaje = '<div class="alert-success">Producto agregado correctamente.</div>';
        } else {
            $mensaje = '<div class="alert-error">Error al agregar producto: ' . $conexion->error . '</div>';
        }
    }
    ?>

    <div class="form-container">
        <?php if (isset($mensaje)) echo $mensaje; ?>
        <h2>Agregar un nuevo vendedor</h2>
        <form method="POST" action="crear.php">



            <label for="nombre">Nombre del vendedor</label>
            <input type="text" name="nombre">

            <button type="submit">Agregar vendedor</button>
        </form>
    </div>
</body>

</html>
