<?php

namespace App\Controllers;

use App\Core\DataBase;
use App\Models\User;

class HomeController {
   public function index(){
     
    $user = new User();

    var_dump($user->insertUser());
     
  }


}

