<?php

require ("funcions.php");
$usuarios=pillarUsuarios();

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
        <h3>Listado de usuarios</h3>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Provincia</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=$usuarios->fetch()){
                        echo '<tr>';
                            echo "<td>".$row['nombre']."</td>";
                            echo "<td>".$row['apellidos']."</td>";
                            echo "<td>".$row['edad']."</td>";
                            echo "<td>".$row['provincia']."</td>";
                            echo "<td><a href='registro.php?user=".$row['id']."'>Editar</a></td>";
                            echo "<td><a href='confirmaciones/eliminadoUsuario.php?user=".$row['id']."'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

</main>

<?php include ('layout/footer.php'); ?>
</body>
</html>
