<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */
function comprobarNif($nif){
    $nif=strtoupper(trim($nif));
    if(strlen($nif)!==9)return false;

    $numero=substr($nif,0,8);
    $letra=$nif[8];

    if(!is_numeric($numero))return false;

    $tabla_letras="TRWAGMYFPDXBNJZSQVHLCKE";
    
    if($tabla_letras[$numero%23]===strtoupper($letra)){
        return true;
    }
    return false;
}

echo comprobarNif('49668392T');
?>