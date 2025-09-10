<?php
function mostrarRibbon($pagina)
{
    echo '
        <div class="topbar">
        <img class="topbar__logo" src="../images/logo.jpg" />
        <span class="topbar__title">Nissi Creaciones</span>
        <div class="button">Cerrar sesión</div>
    </div>

    <div class="ribbon">
        <a class="no-decoration" href="../productos/index.php">
            <div class="ribbon__button ' . ($pagina == "productos" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/box.png">
                </div>
                <span>Productos</span>
            </div>
        </a>

        <a class="no-decoration" href="../ventas/index.php">
            <div class="ribbon__button ' . ($pagina == "ventas" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/sales.png">
                </div>
                <span>Ventas</span>
            </div>
        </a>

        <a class="no-decoration" href="../vendedores/index.php">
            <div class="ribbon__button ' . ($pagina == "vendedores" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/user.png">
                </div>
                <span>Vendedores</span>
            </div>
        </a>

        <a class="no-decoration" href="../insumos/index.php">
            <div class="ribbon__button ' . ($pagina == "insumos" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/supplies.png">
                </div>
                <span>Insumos</span>
            </div>
        </a>

        <a class="no-decoration" href="../proveedores/index.php">
            <div class="ribbon__button ' . ($pagina == "proveedores" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/truck.png">
                </div>
                <span>Proveedores</span>
            </div>
        </a>

        <a class="no-decoration" href="../metodos_pago/index.php">
            <div class="ribbon__button ' . ($pagina == "metodos_pago" ? "active" : "") . '">
                <div class="ribbon__button__image-wrapper">
                    <img src="../images/cards.png">
                </div>
                <span>Métodos de pago</span>
            </div>
        </a>

    </div>
        ';
}
