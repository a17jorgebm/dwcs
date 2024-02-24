<?php

require ('Arbitro.php');

$arb1=new Arbitro('Paco',34,23);
$arb2=new Arbitro('Lucia',24,63);

$arb2->setEdad(22);
$arb2->setNombre('Guillermo');
$arb2->setAnosArbitrados(12);

echo "Arbitro 1--------<br>";
echo "Nombre: {$arb1->getNombre()}<br>";
echo "Edad: {$arb1->getEdad()}<br>";
echo "Años arbitrados: {$arb1->getAnosArbitrados()}<br>";

echo "<br>Arbitro 2--------<br>";
echo "Nombre: {$arb2->getNombre()}<br>";
echo "Edad: {$arb2->getEdad()}<br>";
echo "Años arbitrados: {$arb2->getAnosArbitrados()}<br>";