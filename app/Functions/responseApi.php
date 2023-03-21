<?php

 DEFINE("REQUEST_JSON", file_get_contents("php://input"));

 if($_SERVER['REQUEST_METHOD'] == "OPTIONS"){
    responseApi(200,true, "Invalido");
 }
   
if(!REQUEST_JSON){
    responseApi(400,true, "Requisao nao e valida");
}else{
    json_decode(REQUEST_JSON);
    
}



function responseApi($codigo, $status, $msg){
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");
    
    http_response_code($codigo);

    echo(json_encode([
        'status' => $status,
        'msg' => $msg
    ]));

    die;

 }  
    
   