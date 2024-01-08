<?php

function isPar($arr){
    $temp=[];
    foreach($arr as $c=>$v){
        $temp[]=(is_int($v)?(($v%2==0)?true:false):false);
    }
    return $temp;
}
