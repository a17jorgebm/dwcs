<?php
require ('funcions.php');
comprobarLogin();
visitas();
if (isset($_GET['msg'])){
    if (array_key_exists($_GET['msg'],MENSAJES_PRODUCTO)){
        $mensaje=MENSAJES_PRODUCTO[$_GET['msg']];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SurfSup</title>
    <link rel="stylesheet" href="surf.css">
</head>
<body>
<?php include('layout/header.php') ?>

<main>
    <div id="contido">
        <h4>
            <?php if (isset($mensaje)){
                echo $mensaje;
            }?>
        </h4>
        <h3>Nuevo producto</h3>
        <form method="post" action="controladorSubirProducto.php" enctype="multipart/form-data">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" value="">

            <label for="nome">Descripción: </label>
            <input type="text" id="descripcion" name="descripcion" value="">

            <label for="nome">Precio: </label>
            <input type="text" id="precio" name="precio" value="">

            <label for="nome">Unidades: </label>
            <input type="text" id="unidades" name="unidades" value="">

            <label for="fotos">Foto:</label>
            <input type="file" id="fotos" name="fotos[]" multiple>

            <button type="submit">Guardar</button>
        </form>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>