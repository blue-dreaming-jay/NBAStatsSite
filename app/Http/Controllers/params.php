<?php
namespace App\Http\Controllers;
function make_param($attrs, $data){
    $params=[];
    foreach ($attrs as $attr){
        $params[$attr]=$data[$attr];
    }

    return $params;
}