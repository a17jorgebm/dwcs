<?php
require ('funcions.php');

$mensajes=[
    'Ambos campos son obligatorios',
    'Usuario o contraseña erroneo',
    'Error al intentar iniciar sesion'
];

if (isset($_GET['mensaje']) && isset($mensajes[$_GET['mensaje']])){
    $mensaje=$mensajes[$_GET['mensaje']];
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
        <h3>Login de usuarios</h3>
        <form method="post" action="./loginController.php">
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" required>

            <label for="password">Contraseña: </label>
            <input type="password" id="password" name="password" required>
            <?php if (isset($mensaje)):
                echo "<div style='color: red'><br>{$mensaje}</br></div>";
                endif;
            ?>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>
</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>
