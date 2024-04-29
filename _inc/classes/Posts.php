<?php

class Posts extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();        
    }
    
    public function select(){
        try{
            $query =  $this->db->query("SELECT * FROM posts");
            $qna = $query->fetchAll();
            return $qna;
        }catch(PDOException $e){
            echo($e->getMessage());
        }   
    }

    public function selectImage($imageId){
        try{
            $query =  $this->db->query("SELECT * FROM posts WHERE id=$imageId");
            $qna = $query->fetchAll();
            return $qna;
        }catch(PDOException $e){
            echo($e->getMessage());
        }   
    }

}

?>