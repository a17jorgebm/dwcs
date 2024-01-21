<?php
require ('funcions.php');
visitas();

$usuario=(isset($_GET['user']))?$_GET['user']:null;
if (!is_null($usuario)){
    $datos=getDatosUsuario($usuario);
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
        <h3><?php echo isset($datos) ? 'Edición de usuario' : 'Registro de usuario'; ?></h3>
        <form method="post" action="<?php echo isset($datos) ? 'confirmaciones/usuarioEditado.php' : 'confirmaciones/nuevoUsuario.php'; ?>"> <!-- todo cambiar esto se se esta editando en vez de creando -->
            <label for="nome">Nome: </label>
            <input type="text" id="nome" name="nome" value="<?php echo isset($datos['nombre']) ? $datos['nombre'] : ''; ?>" required>

            <label for="nome">Apellidos: </label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo isset($datos['apellidos']) ? $datos['apellidos'] : ''; ?>" required>

            <label for="nome">Edad: </label>
            <input type="number" id="edad" name="edad" value="<?php echo isset($datos['edad']) ? $datos['edad'] : ''; ?>" required>

            <label for="nome">Provincia: </label>
            <input type="text" id="provincia" name="provincia" value="<?php echo isset($datos['provincia']) ? $datos['provincia'] : ''; ?>" required>

            <?php if (isset($datos['id'])): ?>
                <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
            <?php endif; ?>

            <button type="submit"><?php echo isset($datos) ? 'Guardar cambios' : 'Guardar'; ?></button>
        </form>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>
