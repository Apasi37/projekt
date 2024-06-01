<?php

class Posts extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();
    }
    
    public function selectTable($table){
        try{
            $query =  $this->db->query("SELECT * FROM $table");
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            echo($e->getMessage());
        }   
    }

    public function selectImage($imageId){
        try{
            $query =  $this->db->query("SELECT * FROM posts WHERE id=$imageId");
            $image = $query->fetchAll();
            return $image;
        }catch(PDOException $e){
            echo($e->getMessage());
        }   
    }

    public function showTables(){
        try{
            $query =  $this->db->query("SHOW TABLES");
            $tables = $query->fetchAll(PDO::FETCH_COLUMN);
            return $tables;
        }catch(PDOException $e){
            echo($e->getMessage());
        }  
    }

    public function deleteRow($table, $id){
        try{
            $query =  $this->db->query("DELETE FROM $table WHERE id = $id");
            return true;
        }catch(PDOException $e){
            echo($e->getMessage());
        }  
    }
}

?>