<header>
    <h1><a href="/ud03/tienda/index.php">SurfSup</a></h1>
    <div id="botones-header">
        <a href="/ud03/tienda/registro.php">Registro usuario</a>
        <?php if (isset($_SESSION['nombre'])):?>
            <a href="/ud03/tienda/listado.php">Lista usuarios</a>
            <a href="/ud03/tienda/nuevoProducto.php">Nuevo Producto</a>
            <a href="/ud03/tienda/logout.php">Logout</a>
        <?php endif; ?>

    </div>
</header>