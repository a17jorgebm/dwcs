<?php

require ('Usuario.php');
require ('Administrador.php');

$user=new Usuario('Jorge','Blanco');
$admin=new Administrador('Pepe','Mariño');

$user->accion();
echo "<br>";
$admin->accion();