<?php
namespace App\Controllers;

class UserController{


    public function create(){

        $dados = json_decode(file_get_contents('php://input'), true);

        var_dump ($dados);

        

    }
}
