<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

$F=78;
$C=((78-32)*5)/9;
echo $C." grados Celsius";

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */

//con nuevas variables
$x=20;
$y=10;
$suma=$x+$y;
$resta=$x-$y;
$multiplicacion=$x*$y;
$division=$x/$y;
$modulo=$x%$y;
echo "<br><br>Con variables:<br>
$x+$y=$suma<br>
$x-$y=$resta<br>
$x*$y=$multiplicacion<br>
$x/$y=$division<br>
$x%$y=$modulo<br>
";
//sin nuevas variables
$x=20;
$y=10;
echo "<br><br>Sin variables:<br>
$x+$y=".$x+$y."<br>
$x-$y=".$x-$y."<br>
$x*$y=".$x*$y."<br>
$x/$y=".$x/$y."<br>
$x%$y=".$x%$y."<br>
";

/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/

echo "<br>Cuadrado de los 30 Primeros numeros naturales<br>";
for($i=1;$i<31;$i++){
    echo $i**2;
    if($i!=30) echo ",";
}

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */

 $base=20;
 $altura=10;

 echo "<br><br>Área y perimetro de un rectangulo de base $base y altura $altura";
 echo "<br>Área: ".$base*$altura;
 echo "<br>Perímetro: ".(2*$base+2*$altura);
?>