<?php

namespace App\Core;

use App\Interfaces\InterfaceDB;

abstract class DataBase
{ 

    private $conn;
    private $host = 'localhost';
    private $drive = 'mysql';
    private $db = 'portal';
    private $user = 'root';
    private $password = '';

    public function __construct()
    {
    }

    private function __clone()
    {
    }

    private function ConnectionDB()
    {
        try {
            //$this->conn = new \PDO(''.$this->drive.":host=".$this->host.";dbname=".$this->db.''.",".$this->getUser() .",". $this->password);
           $this->conn = new \PDO('mysql:host=localhost;dbname=portal', 'root','');
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR:' . $e->getMessage();
        }

        return $this->conn;
    }



   
    public function select($table){
        $sql = "SELECT * FROM ". $table;
        $pdo = $this->ConnectionDB()->prepare($sql);
        $pdo->execute();
        return ($pdo->fetchAll());
    }

    public function insert(){      
        return "Aqui vc irá inserir seu PDO INSERT";
        
    }

    public function update()
    {
        return "Aqui vc irá inserir seu PDO UPDATE";
    }


    public function delete()
    {
        return "Aqui vc irá inserir seu PDO DELETE";
    }

	
	
}
