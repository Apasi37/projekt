<?php

class Posts extends Database {
    private $db;
    private static $postsPerPage = 15;

    public function __construct(){
        $this->db = $this->connect();
    }

    public function selectPost($imageId){
        try{
            $query =  $this->db->query("SELECT * FROM posts WHERE id=$imageId");
            $image = $query->fetch(PDO::FETCH_ASSOC);
            return $image;
        }catch(PDOException $e){
            return false;
        }   
    }

    public function getPages(){
        try{
            $query =  $this->db->query("SELECT * FROM posts");
            $posts = $query->fetchAll();
            $number_of_pages = ceil(count($posts)/Posts::$postsPerPage);
            return $number_of_pages;
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function selectPosts($page){
        try{
            $number_of_pages = $this->getPages();
    
            $firstImage = ($page-1)*Posts::$postsPerPage;

            $query =  $this->db->query("SELECT id,image FROM posts LIMIT " . $firstImage . ',' . Posts::$postsPerPage);
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function selectUsername($userId){
        try{
            $query =  $this->db->query("SELECT username FROM user WHERE id = $userId");
            $rows = $query->fetch();
            return $rows;
        }catch(PDOException $e){
            echo($e->getMessage());
        }  
    }

    public function getCommentCount($postId){
        try{
            $query =  $this->db->query("SELECT COUNT(*) AS count FROM comments WHERE postid = $postId");
            $count = $query->fetch();
            return $count;
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function selectComments($postId){
        try{
            $query =  $this->db->query("SELECT * FROM comments WHERE postId = $postId");
            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
            return $rows;
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

    public function selectCommentUsername($userId){
        try{
            $query =  $this->db->query("SELECT username FROM user WHERE id = $userId");
            $rows = $query->fetch();
            return $rows;
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
    
            // SQL dopyt na vloženie nového používateľa
            $sql = "INSERT INTO comments (comment, userId, postId) VALUES (:comment, :userId, :postId)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
        }catch(PDOException $e){
            echo($e->getMessage());
        } 
    }

}

?>