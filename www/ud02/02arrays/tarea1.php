<?php 

//1. Almacena en un array los 10 primeros números pares. Imprímelos cada uno en una línea utilizando los valores contenidos en el array.
echo "<p>Ejer 1-------------------</p>";
$numerosPares=[];
for($i=0;$i<=20;$i+=2){
    $numerosPares[]=$i;
    echo $numerosPares[count($numerosPares)-1]."<br>";
}
/* 2. Imprime los valores del array asociativo siguiente usando un foreach:*/
$v[1]=90;
$v[10] = 200;
$v['hola']=43;
$v[9]='e';
echo "<p>Ejer 2-------------------</p>";
foreach($v as $clave=>$valor){
    echo "$valor<br>";
}
?>