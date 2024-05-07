<?php
class User extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect();
    }

    public function register($email, $password){
        try{
         
            $hashed_password = $password;
    
            // Dáta pre vloženie nového používateľa do databázy
            $data = array(
                'email' => $email,
                'password' => md5($hashed_password),
                'role'=>'0'
            );
    
            // SQL dopyt na vloženie nového používateľa
            $sql = "INSERT INTO user (email, password,role) VALUES (:email, :password, :role)";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
    
            // Úspešná registrácia
            return true;
        } catch(PDOException $e){
            // Spracovanie chyby, ak nastane
            echo "Chyba pri registrácii: " . $e->getMessage();
            return false;
        }
    }

    public function login($username, $password){
        //$username a $password došli z $_POST 
        try{
            $data = array(
                'email'=>$username,
                'password'=>$password,
            );
            
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
            $query_run = $this->db->prepare($sql);
            $query_run->execute($data);
            if($query_run->rowCount() == 1) {
                // login je uspesny
                $_SESSION['logged_in'] = true;
                $_SESSION['is_admin'] = $query_run->fetch()->role;
                return true;
            } else {
                return false;
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>