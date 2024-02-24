<?php

require ('NotasDaw.php');

$nota=new NotasDaw(array(1,3,2,8,9,6,3,1,10,2,8,8,4.3,5.4,7.5,4));

echo "Aprobados: ".$nota->numeroAprobados()."<br>";
echo "Suspensos: ".$nota->numeroDeSuspensos()."<br>";
echo "Media: ".sprintf('%.2f',$nota->notaMedia())."<br>";
echo "Notas: ".$nota->toString()."<br>";

