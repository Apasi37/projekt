<?php
    require_once('../_inc/classes/Page.php');
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
<body onload="indexFadeIn()">
    <header id="indexHeader">
        <h1 id="indexTitle">Regul Art</h1>
        <div class="searchBarDiv" id="indexSearchBarDiv">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>
        <nav>
            <a href="posts.php?page=1" class="aButton">Posts</a>
        </nav>
        <div id="homeProfile">
            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                    echo('
                        <div class="profile" onclick="toggleProfileMenu()">
                            <div>'.$_SESSION['username'].'</div>
                            <img src="../assets/img/defaultprofile.png" alt="IMAGE">
                        </div>
                    ');
                }else{
                    echo('
                        <a href="login.php" class="aButton">Login</a>
                    ');
                }
                if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){
                    echo('
                        <a class="aButton" href="./admin.php?selectedTable=posts">admin panel</a>
                    ');
                }
            ?>
        </div>
    </header>

    <?php
    echo($page_object->add_scripts());
    ?>
</body>
</html>