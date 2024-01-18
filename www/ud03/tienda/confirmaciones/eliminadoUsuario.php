<?php
    require("../funcions.php");

    $mensaje=eliminarUsuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SurfSup</title>
    <link rel="stylesheet" href="../surf.css">
</head>

<body>
<?php require("../layout/header.php"); ?>

<main>
    <div id="contido">
        <?php imprimeMensajes($mensaje); ?>

        <a href="../listado.php">Volver</a>
    </div>
</main>
<?php require("../layout/footer.php"); ?>
</body>

</html>
