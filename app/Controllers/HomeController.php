<?php

namespace App\Controllers;

use App\Core\DataBase;
use App\Models\User;

class HomeController {
   public function index(){
     
    $user = new User();

    $data = ['nome' => 'Alex Santana', 'email' => 'alex@alex', 'senha' => '123456'];

    var_dump($user->insertUser($data));
     
  }


}

