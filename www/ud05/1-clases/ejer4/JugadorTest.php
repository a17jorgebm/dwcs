<?php

require ('Jugador.php');

$jug1=new Jugador('Paco',34,'portero');
$jug2=new Jugador('Lucia',24,'lateral derecho');

$jug2->setEdad(22);
$jug2->setNombre('Guillermo');
$jug2->setPosicion('central');

echo "Jugador 1--------<br>";
echo "Nombre: {$jug1->getNombre()}<br>";
echo "Edad: {$jug1->getEdad()}<br>";
echo "Posicion: {$jug1->getPosicion()}<br>";

echo "<br>Jugador 2--------<br>";
echo "Nombre: {$jug2->getNombre()}<br>";
echo "Edad: {$jug2->getEdad()}<br>";
echo "Posicion: {$jug2->getPosicion()}<br>";