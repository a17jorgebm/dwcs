<?php

require_once("Perro.php");
require_once("Gato.php");

$perro=new Perro("Juan",23);
echo 'Clase perro----------<br>';
echo 'Nombre: '.$perro->getNombre().'<br>';
echo 'Edad: '.$perro->getEdad().'<br>';
echo 'Sonido: ';
$perro->emitirSonido();


$gato=new Gato("Misifu",2);
echo '<br>Clase gato----------<br>';
echo 'Nombre: '.$gato->getNombre().'<br>';
echo 'Edad: '.$gato->getEdad().'<br>';
echo 'Sonido: ';
$gato->emitirSonido();