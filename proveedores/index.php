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

        mostrarRibbon("proveedores");
    ?>

    <main>
        <div class="toolbar">
            <div class="button highlight">
                + Agregar proveedor
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Papelera Necochea</td>
                    <td>Necochea 1234</td>
                    <td>3794531795</td>
                    <td>...</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
