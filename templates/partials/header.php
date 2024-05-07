<?php
    require_once('../_inc/classes/Page.php');
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/User.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <?php
        $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
        $page_object  = new Page($page_name);
        echo($page_object->add_stylesheet());
        echo('<title>Moj web | '. $page_name.'.php</title>')
    ?>
    
</head>
<body>
    
<header id="header">
        <h1><a href="../templates/home.php">Regul Art</a></h1>

        <div class="searchBarDiv">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>

        <nav>
            <a href="posts.php" class="aButton">Posts</a>
        </nav>

        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){

            echo('
                <div class="profile" id="headerProfile" onclick="toggleProfileMenu()">
                    <div>asd</div>
                    <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                </div>

                <div id="profileMenu">
                    <a href="" class="aButton">Profile</a>
                    <a href="" class="aButton">Upload Image</a>
                    <a href="" class="aButton">Log Out</a>
                </div>
            ');
        }else{
            echo('
                <div id="notLoggedIn">
                    <div class="aButton" onclick="openLogIn()">Log In</div>
                    <div class="aButton" onclick="openSignUp()">Sign Up</div>
                </div>

                <div class="login-signup" id="logIn">
                    <form action="" method="POST" class="headerForm">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <input type="submit" name="user_login">
                    </form>
                </div>

                <div class="login-signup" id="signUp">
                    <form name="signUp" action="" method="POST" class="headerForm" onsubmit="validatePassword()">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <label for="passwordcheck">Repeat Password</label>
                        <input type="password" id="passwordcheck" name="passwordcheck" required>
                        <label for="checkbox">I have read the terms of service</label>
                        <input type="checkbox" id="checkbox" required>
                        <input type="submit" name="user_register">
                    </form>
            
                </div><div id="overlay">
                </div>');

            if(isset($_POST['user_register'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                // Kontrola, či sa zadané heslá zhodujú
                if($password === $confirm_password) {
                    // Volanie metódy register() na vytvorenie používateľa
                    if($user_object->register($email, $password)) {
                        // Registrácia bola úspešná
                        echo "<p>Registrácia bola úspešná. Teraz sa môžete prihlásiť.</p>";
                    } else {
                        // Registrácia zlyhala
                        echo "<p>Registrácia zlyhala. Skúste to prosím znova.</p>";
                    }
                } else {
                    // Heslá sa nezhodujú
                    echo "<p>Heslá sa nezhodujú. Skúste to prosím znova.</p>";
                }
            }
            if(isset($_POST['user_login'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = new User();
                //tu bude vzdy true alebo false
                $login_success = $user->login($email,$password);
            }
        }
        ?>

    </header>
