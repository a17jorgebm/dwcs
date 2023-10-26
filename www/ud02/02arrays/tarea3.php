<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
$matriz1=[];
for($i=1;$i<=30;$i++){
    $matriz1[]=rand(0,20);
    echo $matriz1[count($matriz1)-1];
    if($i!=30) echo ",";
}
/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
echo "<p>";
$matriz2=['Batman', 'Superman', 'Krusty', 'Bob', 'Mel' , 'Barney'];
array_pop($matriz2);
echo array_search('Superman',$matriz2).'<br>';
array_push($matriz2,'Carl', 'Lenny', 'Burns' , 'Lisa');
sort($matriz2);
foreach($matriz2 as $c=>$v){echo $v.',';}
array_unshift($matriz2,'Apple', 'Melon', 'Watermelon');

/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
$copia=array_slice($matriz2,2,3);
array_push($copia,'Pera');
?>