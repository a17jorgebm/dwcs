<?php

$coches = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);

function imprimirTabla($arr){

    $temp=array_filter($arr,function($var){
        return (strlen($var[0])>4 && $var[2]>10);
    });

    $tabla="<table>
    <tr>
      <th>Marca</th>
      <th>Stock</th>
      <th>Ventas</th>
    </tr>";
    foreach($temp as $clave=>$coche){
        $tabla.="<tr>";
        foreach($coche as $c=>$dato){
            $tabla.="<td>$dato</td>";
        }
        $tabla.="</tr>";
    }
    $tabla.="</table>";
    echo $tabla;
}