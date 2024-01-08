

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
        <h3>Registo de usuario</h3>
        <form>
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>

            <label for="nome">apellidos: </label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="nome">edad: </label>
            <input type="number" id="edad" name="edad" required>

            <label for="nome">provincia: </label>
            <input type="text" id="provincia" name="provincia" required>
            <button type="submit">Guardar</button>
        </form>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>
