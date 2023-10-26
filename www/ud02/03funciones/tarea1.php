<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
function comprobarDixito($c){
    if(is_numeric($c) && 0<=$c && $c<=9){
        echo "<p>É un caracter entre 0 e 9</p>";
    }
    else{
        echo "<p>Non é un caracter entre 0 e 9</p>";
    }
}
comprobarDixito('sdf');
// 2. Crea una función que reciba un string e devolva a súa lonxitude.
function saberLonxutideString($s){
    return strlen($s);
}
echo saberLonxutideString('ola');
// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
function elevarDousNumeros($a,$b){
    if(is_numeric($a) && is_numeric($b)){
        return $a**$b;
    }
    return false;
}
echo '<br>'.elevarDousNumeros(2,3);
// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
function comprobarVogal($v){
    $vogales=['a','e','i','o','u'];
    return in_array(strtolower($v),$vogales);
}
echo '<br>';
echo comprobarVogal('U');
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
function comprobarParImpar($n){
    if(is_numeric($n)){
        return ($n%2==0)?'Par':'Impar';
    }
    return 'NaN';
}
echo '<br>';
echo comprobarParImpar(3);
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
function pasarStringMayusc($s){
    return strtoupper($s);
}
echo '<br>';
echo pasarStringMayusc('proba');
// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
function zonaHorariaPreterminada(){
    echo date_default_timezone_get();
}
echo '<br>';
zonaHorariaPreterminada();
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
echo puestaSol();
?>