<!DOCTYPE html>
<<<<<<< HEAD
<html lang="es">
=======
<html lang="en">
>>>>>>> a8f64905dd06084c12c8421874007a23922f8478

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissi Creaciones</title>
    <link rel="stylesheet" href="../styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
<<<<<<< HEAD
        include '../includes/header.php';
        mostrarRibbon("productos");
    ?>

    <main>
    <div class="toolbar">
    <a href="agregar.php" class="button highlight">
        + Agregar producto
    </a>
</div>
=======
    include '../includes/header.php';

    mostrarRibbon("productos");
    ?>

    <main>
        <div class="toolbar">
            <a href="crear.php" class="button highlight">
                + Agregar producto
            </a>
        </div>
>>>>>>> a8f64905dd06084c12c8421874007a23922f8478

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
<<<<<<< HEAD
                    // Datos de conexión
                    $host = "localhost";
                    $usuario = "root";
                    $clave = "";
                    $baseDatos = "pp2025";

                    // Conexión a MySQL
                    $conexion = new mysqli($host, $usuario, $clave, $baseDatos);

                    // Verificar conexión
                    if ($conexion->connect_error) {
                        die("Error de conexión: " . $conexion->connect_error);
                    }

                    // Consulta para obtener los productos
                    $sql = "SELECT cod_producto, nombre, precio FROM productos";
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
                        echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
                    }

                    // Cerrar conexión
                    $conexion->close();
=======
                // Datos de conexión
                $host = "localhost";     // Servidor (normalmente localhost)
                $usuario = "root";       // Usuario de MySQL
                $clave = "";             // Contraseña de MySQL
                $baseDatos = "pp2025";  // Nombre de tu base de datos

                // Conexión a MySQL
                $conexion = new mysqli($host, $usuario, $clave, $baseDatos);

                // Verificar conexión
                if ($conexion->connect_error) {
                    die("Error de conexión: " . $conexion->connect_error);
                }

                // Consulta para obtener los productos
                $sql = "SELECT cod_producto, nombre, precio FROM productos";
                $resultado = $conexion->query($sql);

                if (!$resultado) {
                    // Mostrar el error real de MySQL
                    die("Error en la consulta: " . $conexion->error);
                }

                // Mostrar resultados en una tabla HTML
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $fila["cod_producto"] . "</td>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>$" . number_format($fila["precio"], 2) . "</td>";
                        echo '<td>';
                        echo '<div class="options-menu">';
                        echo '<button class="options-btn">⋮</button>';
                        echo '<div class="options-dropdown">';
                        echo '<a href="editar.php?cod_producto=' . $fila["cod_producto"] . '">Editar</a>';
                        echo '<a href="eliminar.php?cod_producto=' . $fila["cod_producto"] . '" onclick="return confirm(\'¿Seguro que deseas eliminar este producto?\');">Eliminar</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
                }

                // Cerrar conexión
                $conexion->close();
>>>>>>> a8f64905dd06084c12c8421874007a23922f8478
                ?>
            </tbody>
        </table>
    </main>
</body>

<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> a8f64905dd06084c12c8421874007a23922f8478
