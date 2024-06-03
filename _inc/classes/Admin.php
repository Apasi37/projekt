<?php

class Admin extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();
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

    public function selectTable($table){
        try{
            $query =  $this->db->query("SELECT * FROM $table");
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
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

    public function addComment($comment, $userId, $postId){
        try{
            $data = array(
                'comment' => $comment,
                'userId' => $userId,
                'postId' => $postId
            );

            $sql =  "INSERT INTO comments (comment, userId, postId) VALUES (:comment, :userId, :postId)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function addUser($username, $email, $password, $role){
        try{
            $data = array(
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'role' => $role
            );

            $sql =  "INSERT INTO user (username, email, password, role) VALUES (:username, :email, :password, :role)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function addPost($image, $name, $userId, $description){
        try{
            $data = array(
                'image' => $image,
                'name' => $name,
                'userId' => $userId,
                'description' => $description
            );

            $sql =  "INSERT INTO posts (image, name, userId, description) VALUES (:image, :name, :userId, :description)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function editPost($id,$data){
        try{
            $sql = "UPDATE posts SET ";
            foreach($data as $key => $value){
                if($value == null){
                    unset($data[$key]);
                }else{
                    $sql .= $key." = :".$key.",";
                }
            }
            $sql = substr($sql,0,strlen($sql)-1);
            $sql .= " WHERE id = $id";

            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function editUser($id,$data){
        try{
            $sql = "UPDATE user SET ";
            foreach($data as $key => $value){
                if($value == null){
                    unset($data[$key]);
                }else{
                    $sql .= $key." = :".$key.",";
                }
            }
            $sql = substr($sql,0,strlen($sql)-1);
            $sql .= " WHERE id = $id";

            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function editComment($id,$data){
        try{
            $sql = "UPDATE comments SET ";
            foreach($data as $key => $value){
                if($value == null){
                    unset($data[$key]);
                }else{
                    $sql .= $key." = :".$key.",";
                }
            }
            $sql = substr($sql,0,strlen($sql)-1);
            $sql .= " WHERE id = $id";

            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }
    
}

?>