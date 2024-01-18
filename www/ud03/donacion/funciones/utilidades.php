<?php

function comprobarCampo($campo){
    return htmlspecialchars(stripslashes(trim($campo)));
}

function getCampoFormularioLimpio($nombreCampo,$metodo='post'){
    if (strtolower($metodo)=='post'){
        $campo=isset($_POST[$nombreCampo])?$_POST[$nombreCampo]:null;
    }else{
        $campo=isset($_GET[$nombreCampo])?$_GET[$nombreCampo]:null;
    }
    return comprobarCampo($campo);
}

function checkCamposObligatorios($campos){
    foreach ($campos as $campo){
        if(is_null($campo)) return null;
    }
    return true;
}

function checkCamposNumericos($campos){
    foreach ($campos as $campo){
        if(is_null($campo)) return null;
    }
    return true;
}
