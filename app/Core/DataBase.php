<?php

namespace App\Core;



/**
 * Summary of DataBase
 */
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
            $this->conn = new \PDO(''.$this->drive.':host='.$this->host.':3306;dbname='.$this->db.'',$this->user , $this->password);
            
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'ERROR:' . $e->getMessage();
        }

        return $this->conn;
    }



   
    public function select($table){
        $sql = "SELECT * FROM  $table";
        $pdo = $this->ConnectionDB()->prepare($sql);
        $pdo->execute();
        return ($pdo->fetchAll());
    }

    /**
     * Summary of insert
     * @param mixed $table
     * @param mixed $data
     * @return bool
     */
    public function insert($table, $data, $fillable){
       

        $fillable = "`".implode("`".','."`", $fillable  )."`";  
        
        $subs = $this->subsArray($data,'?');
        $values = implode(",", $subs);
        
        $sql = "INSERT INTO $fillable VALUES $values";
        /*$pdo = $this->ConnectionDB()->prepare($sql);
        $pdo->execute();
        return ($pdo->fetchAll());*/

         return $sql;
        
    }

    public function update()
    {
        return "Aqui vc irá inserir seu PDO UPDATE";
    }


    public function delete()
    {
        return "Aqui vc irá inserir seu PDO DELETE";
    }



    function subsArray($data, $value){

   
        $qdtData = count($data);
            
        $array = [];
    
        for($i = 0; $i < $qdtData; $i++){
    
            array_push($array, $value); 
    
        }
    
        return $array;
    
    }
    




   

	
	
}
