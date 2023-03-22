<?php

namespace App\Core;

use App\Classes\ConvertArrays;
use PDOException;

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
            $this->conn = new \PDO('' . $this->drive . ':host=' . $this->host . ':3306;dbname=' . $this->db . '', $this->user, $this->password);

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR:' . $e->getMessage();
        }

        return $this->conn;
    }




    public function select($table)
    {
        $sql = "SELECT * FROM  $table";
        $pdo = $this->ConnectionDB()->prepare($sql);
        $pdo->execute();
        return ($pdo->fetchAll());
    }


    public function insert(String $table, Array $data, Array $fillable)
    {

        $convertarray = new ConvertArrays();

        $fillable = "`" . implode("`" . ',' . "`", $fillable) . "`";

        $strArray = $convertarray->strArray($data, '?');
        $values = implode(",", $strArray);

        $sql = "INSERT INTO $table($fillable) VALUES $values";
        $pdo = $this->ConnectionDB()->prepare($sql);


        try {
            $keyarrays = 1;
            foreach ($data as $key => $value) {
                $pdo->bindValue($keyarrays, $value);
                $keyarrays++;
            }

            $pdo->execute();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
            
        }

        //return $sql;

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
