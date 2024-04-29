<?php
    require_once('../_inc/classes/Page.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>RegulArt</title>
    <?php
        $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
        $page_object  = new Page($page_name);
        echo($page_object->add_stylesheet());
    ?>
</head>
<body onload="indexFadeIn()">
    <header id="indexHeader">
        <h1 id="indexTitle">Regul Art</h1>
        <div class="searchBarDiv" id="indexSearchBarDiv">
            <input type="text" class="searchBar" placeholder="Search...">
        </div>
        <nav>
            <a href="posts.php" class="aButton">Posts</a>
        </nav>
    </header>

    <?php
    $page_name = basename($_SERVER["SCRIPT_NAME"], '.php');
    $page_object  = new Page($page_name);
    echo($page_object->add_scripts());
    ?>
</body>
</html>