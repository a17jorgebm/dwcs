<?php

include "lib/base_datos.php";
include "lib/utilidades.php";

$conexion = get_conexion();
seleccionar_bd_donacion($conexion);

$mensajes = array();

$fecha1 = "";
$fecha2 = "";

if (isset($_POST['submit'])) {
    if (!empty($_POST['fecha1'])) {
        $fecha1 = test_input($_POST['fecha1']);
    } else {
        $mensajes[] = array("error", "Introduce un nombre");
    }

    if (!empty($_POST['fecha2'])) {
        $fecha2 = test_input($_POST['fecha2']);
    } else {
        $mensajes[] = array("error", "Introduce un apellido");
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
  <h1>Buscador de informes</h1>

<?= get_mensajes_html_format($mensajes); ?>

  <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      Fecha Inicio: <input type="date" name="fecha1" value="<?= $fecha1?>" required>
      <br><br>
      Fecha Fin: <input type="date" name="fecha2" value="<?= $fecha2?>" required>
      <br><br>
      <input type="submit" name="submit" value="Submit"> 
    </form>
  <footer>
      <p><a href='index.php'>Página de inicio</a></p>
  </footer>

  <?php cerrar_conexion($conexion);?>

</body>

</html>