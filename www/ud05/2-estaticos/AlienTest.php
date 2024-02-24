<?php

require ('Alien.php');

$alien1=new Alien('a');
$alien1=new Alien('b');
$alien1=new Alien('c');
$alien1=new Alien('d');
$alien1=new Alien('e');

echo "Numero de aliens creados: ".Alien::getNumberOfAliens();