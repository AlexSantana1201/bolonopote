<?php
// router.php

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {


    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    
     require_once("../vendor/autoload.php");
     //require_once("../app/Functions/responseApi.php");
     require_once("../bootstrap/bootstrap.php");



   
   

}

?>