<?php
require('funcions.php');
visitas();
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['idioma'])){
        setIdioma($_POST['idioma']);
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
        <p><?php echo TRADUCCIONES[$idiomaId]; ?></p>
        <p>
            Selecciona un idioma:
            <form action=""
            <select>
                <?php foreach (IDIOMAS_DISPONIBLES as $clave=>$idioma):?>
                    <option value="<?php echo $clave; ?>"><?php echo $idioma; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>