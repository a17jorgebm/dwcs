<?php

function camposObligatoriosCompletados($campos){
    foreach($campos as $campo){
        if($campo===null) return false;
        if($campo='') return false;
    }

    return true;
}

function emailValido($email){
    $regex='/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($regex,$email);
}

function mensajeErrorParametrosInvalidos($mensaje){
    return Flight::halt(400,json_encode(array("success"=>false,"message"=>$mensaje)));
}