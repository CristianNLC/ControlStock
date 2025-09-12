<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissi Creaciones</title>
    <link rel="stylesheet" href="/styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
        include '../includes/header.php';

        mostrarRibbon("productos");
    ?>

    <main>
        <div class="toolbar">
            <div class="button highlight">
                + Agregar producto
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Datos de conexión
                    $host = "wd.zaifo.com.ar";     // Servidor (normalmente localhost)
                    $usuario = "root";       // Usuario de MySQL
                    $clave = "admin1234";             // Contraseña de MySQL
                    $baseDatos = "pp2025";  // Nombre de tu base de datos

                    // Conexión a MySQL
                    $conexion = new mysqli($host, $usuario, $clave, $baseDatos);

                    // Verificar conexión
                    if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                    }

                    // Consulta para obtener los productos
                    $sql = "SELECT cod_procucto, nombre, precio FROM productos";
                    $resultado = $conexion->query($sql);

                    // Mostrar resultados en una tabla HTML
                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $fila["cod_producto"] . "</td>";
                            echo "<td>" . $fila["nombre"] . "</td>";
                            echo "<td>$" . number_format($fila["precio"], 2) . "</td>";
                            echo "<td>...</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "No se encontraron productos.";
                    }

                    // Cerrar conexión
                    $conexion->close();
                    ?>
            </tbody>
        </table>
    </main>
</body>

</html>
