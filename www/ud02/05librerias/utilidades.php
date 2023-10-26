<?php 

//2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciones como un comentario del código fuente.

/*

-A diferenza entre include e require é que include non para a execución do script se non encontra o arquivo e require si.
-As suas variantes con _once teñen o mesmo comportamento, a única diferenza é que comproban se o arquivo xa se incluiu para non facelo de novo.

*/


// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarDixito($c){
    if(is_numeric($c) && 0<=$c && $c<=9){
        echo "<p>É un caracter entre 0 e 9</p>";
    }
    else{
        echo "<p>Non é un caracter entre 0 e 9</p>";
    }
}

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function saberLonxutideString($s){
    return strlen($s);
}

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function elevarDousNumeros($a,$b){
    if(is_numeric($a) && is_numeric($b)){
        return $a**$b;
    }
    return false;
}

// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function comprobarVogal($v){
    $vogales=['a','e','i','o','u'];
    return in_array(strtolower($v),$vogales);
}

// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function comprobarParImpar($n){
    if(is_numeric($n)){
        return ($n%2==0)?'Par':'Impar';
    }
    return 'NaN';
}

// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function pasarStringMayusc($s){
    return strtoupper($s);
}

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function zonaHorariaPreterminada(){
    echo date_default_timezone_get();
}

/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
function puestaSol(){
    return date_sunset(
        time(),
        SUNFUNCS_RET_STRING,
        ini_get("date.default_latitude"),
        ini_get("date.default_longitude"),
        ini_get("date.sunset_zenith"),
        1
    );
}

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
?>