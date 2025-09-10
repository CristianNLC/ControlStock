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
    include '../includes/header.php';

    mostrarRibbon("insumos");
    ?>

    <main>
        <div class="toolbar">
            <div class="button highlight">
                + Agregar insumo
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Punto de pedido</th>
                    <th>Stock</th>
                    <th>Proveedor</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cinta bifaz</td>
                    <td>10</td>
                    <td style="color: green;">15</td>
                    <td>Papelera Necochea</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Taza cerámica</td>
                    <td>8</td>
                    <td style="color: red;">7</td>
                    <td>Papelera Necochea</td>
                    <td>...</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
