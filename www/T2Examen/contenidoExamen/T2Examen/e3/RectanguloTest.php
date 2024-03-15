<?php

namespace e3;

require("Rectangulo.php");

$r=new Rectangulo(4,5);
$r->dibujar();
echo "<br>Agrandando...<br>";
$r->agrandar(4);
$r->dibujar();

echo "<br>Encollendo...<br>";
$r->encoger(2);
$r->dibujar();
