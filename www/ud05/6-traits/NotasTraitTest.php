<?php

require ('NotasTrait.php');

$notas=new NotasTrait(array(1,3,6,4,2,4,7,7.8,4.3,9.5,9));

echo $notas->saludo()."<br>";
echo $notas->showCalculusStudyCenter(
        $notas->numeroAprobados(),
        $notas->numeroDeSuspensos(),
        $notas->notaMedia()
);