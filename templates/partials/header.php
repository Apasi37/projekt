<?php
    require_once('../_inc/classes/Page.php');
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/User.php');
    require_once('../_inc/classes/Posts.php');
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
        echo('<title>Regulart | '. $page_name.'.php</title>')
    ?>
    
</head>
<body>
    
<header id="header">
        <h1><a href="../templates/home.php">Regul Art</a></h1>

        <div class="searchBarDiv">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>

        <nav>
            <a href="posts.php?page=1" class="aButton">Posts</a>
        </nav>

        <?php
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
            echo('
                <div class="profile" id="headerProfile" onclick="openProfileMenu()">
                    <div>'.$_SESSION['username'].'</div>
                    <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                </div>

                <div id="profileMenu">
                    <a href="./logout.php" class="aButton">Log Out</a>
            ');
            if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                echo('
                    <a class="aButton" href="./admin.php?selectedTable=posts">admin panel</a>
                ');
            }
            echo('</div>');
        }else{
            echo('
                <div id="notLoggedIn">
                    <a href="./login.php" class="aButton">Log In</a>
                </div>
            ');
        }
        ?>

</header>
