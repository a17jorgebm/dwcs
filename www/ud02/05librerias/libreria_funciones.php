<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
// Opción A
function es_digito_a($caracter) {
    if($caracter>=0 && $caracter<=9) {
        return true;
    }
    else {
       return false; 
    }
}
// Opción B
function es_digito_b($caracter) {
    $caracter>=0 && $caracter ? $es_digito= true : $es_digito= false ;
    return $es_digito;
}


// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function longString($a) {
    return strlen($a);
}

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function exponente($a,$b) {
    if(is_numeric($a) && is_numeric($b)) {
        $resultado = pow($a,$b);
        return $resultado;
    }
}


// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function es_vocal($caracter) {
    
    $caracter = strtolower($caracter); //Lo convertimos a minúscula para comprobar mayúsculas y minúsculas
    $vocales = ['a', 'e', 'i', 'o', 'u'];
    if(array_search($caracter)) {
        return true;
    }else{
        return false;
    }
  
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function parImpar($numero) {
    if($numero %2==0) {
        return true;
    }else{
        return false;
    }
            
}


// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function minToMayus($string) {
    return strtoupper($string);
}


// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function zonaHoraria() {
    return date_default_timezone_get();
}


/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function puestaSol() {
    $fecha = time(); //creo el timestamp, aunque creo que no me pilla la fecha actual
    $latitud = ini_get("date.default_latitude"); //extraigo latitud
    $longitud = ini_get("date.default_longitude");//longitud
    $zenit = ini_get("date.sunset_zenith");//el zenith que viene en php
    $gmt_offset = 1; //corrijo a GTM+1
    $resultado = date_sunset($fecha,SUNFUNCS_RET_STRING,$latitud,$longitud,$zenit,$gmt_offset);
    return $resultado;
}


?>