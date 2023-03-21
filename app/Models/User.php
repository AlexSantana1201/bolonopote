<?php

namespace App\Models;
use App\Core\DataBase;

class User extends DataBase{
  
  private  $table = 'users';

  private $fillable = ['login','email','senha'];
  private $id = 'id';

    public function insertUser($data){

       $insertUser = DataBase::insert($this->table, $data, $this->fillable);

       return $insertUser;
    }

}