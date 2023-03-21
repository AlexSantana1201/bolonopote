<?php

namespace App\Models;
use App\Core\DataBase;

class User extends DataBase{
  


    public function insertUser(){

        echo DataBase::insert();
    }

}