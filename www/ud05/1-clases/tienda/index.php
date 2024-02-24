<?php
require('funcions.php');
comprobarLogin();
$visitas=visitas();

$idiomaId=getIdioma();
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
        <p><?php echo TRADUCCIONES[$idiomaId]; ?></p>
        <p>Es tu visita número <?php echo $visitas; ?></p>
        <p>
            Selecciona un idioma:
            <form action="cambiarIdioma.php" method="post">
                <select name="idioma">
                    <?php foreach (IDIOMAS_DISPONIBLES as $clave=>$idioma):?>
                        <option value="<?php echo $clave; ?>" <?php echo ($clave==$idiomaId) ? 'selected' : ''; ?>><?php echo $idioma; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" style="margin-top: 10px">Cambiar idioma</button>
            </form>
        </p>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>

