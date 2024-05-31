<?php
include_once('partials/header.php');
?>
<div class="login-signup" id="logIn">
    <form action="" method="POST" class="headerForm">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <input class="formSubmit" type="submit" name="user_login" value="Login">
        <div>Don't have an account? <a href="register.php" class="aButton">Register</a></div>
    </form>
    <?php
        if(isset($_POST['user_login'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = new User();
            //tu bude vzdy true alebo false
            $login_success = $user->login($email,$password);
            if($login_success == true){
                header('Location: home.php');
                exit;
            }else{
                echo 'Nesprávne meno alebo heslo';
            }
        }
    ?>
    
</div>
