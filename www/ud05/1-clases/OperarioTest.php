<?php

require ("Operario.php");

echo "Operario creado correctamente--------<br>";
try{
    $ope1=new Operario('Jorge',1500,'diurno');
    echo "Nombre: {$ope1->getNombre()}";
    echo "<br>";
    echo "Salario: {$ope1->getSalario()}";
    echo "<br>";
    echo "Turno: {$ope1->getTurno()}";
}catch (Exception $e){
    echo "Error al crear el operario: {$e->getMessage()}";
}


echo "<br><br>Operario creado incorrectamente--------<br>";
try{
    $ope2=new Operario('Eva',2300,'mañana');
    echo "Nombre: {$ope2->getNombre()}";
    echo "<br>";
    echo "Salario: {$ope2->getSalario()}";
    echo "<br>";
    echo "Turno: {$ope2->getTurno()}";
}catch (Exception $e){
    echo "Error al crear el operario: {$e->getMessage()}";
}
