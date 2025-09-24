<!DOCTYPE html>
<html lang="en">

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

        mostrarRibbon("vendedores");
    ?>

    <main>
    <div class="toolbar">
    <a href="agregar.php" class="button highlight">
        + Agregar vendedor
    </a>
</div>
=======
    include '../includes/header.php';

    mostrarRibbon("vendedores");
    ?>

    <main>
        <div class="toolbar">
            <div class="button highlight">
                <a href="crear.php" class="button highlight">
                    + Agregar vendedor
                </a>
            </div>
        </div>
>>>>>>> a8f64905dd06084c12c8421874007a23922f8478

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
<<<<<<< HEAD
                <tr>
                    <td>1</td>
                    <td>Juan Perez</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Juana Perez</td>
                    <td>...</td>
=======
                <?php
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
                $sql = "SELECT nombre,cod_vendedor FROM vendedores";
                $resultado = $conexion->query($sql);

                if (!$resultado) {
                    // Mostrar el error real de MySQL
                    die("Error en la consulta: " . $conexion->error);
                }
                // Mostrar resultados en una tabla HTML
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";

                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo '<td>';
                        echo '<div class="options-menu">';
                        echo '<button class="options-btn">⋮</button>';
                        echo '<div class="options-dropdown">';
                        echo '<a href="editar.php?cod_vendedor=' . $fila["cod_vendedor"] . '">Editar</a>';
                        echo '<a href="eliminar.php?cod_vendedor=' . $fila["cod_vendedor"] . '" onclick="return confirm(\'¿Seguro que deseas eliminar este vendedor?\');">Eliminar</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontro el vendedor.</td></tr>";
                }

                // Cerrar conexión
                $conexion->close();
                ?>

>>>>>>> a8f64905dd06084c12c8421874007a23922f8478
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
