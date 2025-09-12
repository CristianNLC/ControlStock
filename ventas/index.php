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

        mostrarRibbon("ventas");
    ?>

    <main>
        <div class="toolbar">
            <div class="button highlight">
                + Agregar venta
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Fecha venta</th>
                    <th>Vendedor</th>
                    <th>Estado de pago</th>
                    <th>Estado de entrega</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>08/04/2025</td>
                    <td>2</td>
                    <td>Efectivo</td>
                    <td>En proceso</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>08/04/2025</td>
                    <td>1</td>
                    <td>Transferencia</td>
                    <td>Terminado</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>08/04/2025</td>
                    <td>2</td>
                    <td>Mercado pago</td>
                    <td>Entregado</td>
                    <td>...</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>08/04/2025</td>
                    <td>1</td>
                    <td>Efectivo</td>
                    <td>Terminado</td>
                    <td>...</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>
