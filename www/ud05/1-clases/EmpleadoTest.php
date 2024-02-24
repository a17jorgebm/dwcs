<?php

require ("Empleado.php");

echo "Empleado creado correctamente--------<br>";
try{
    $emple1=new Empleado('Jorge',1500);
    echo "Nombre: {$emple1->getNombre()}";
    echo "<br>";
    echo "Salario: {$emple1->getSalario()}";
}catch (Exception $e){
    echo "Error al crear el empleado: {$e->getMessage()}";
}


echo "<br><br>Empleado creado incorrectamente--------<br>";
try{
    $emple2=new Empleado('Eva',2300);
    echo "Nombre: {$emple1->getNombre()}";
    echo "<br>";
    echo "Salario: {$emple1->getSalario()}";
}catch (Exception $e){
    echo "Error al crear el empleado: {$e->getMessage()}";
}
