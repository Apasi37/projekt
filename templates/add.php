<?php
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Admin.php');

    $admin = new Admin();
    if($_POST['table']=='comments'){
        $admin->addComment($_POST['comment'], $_POST['userId'], $_POST['postId']);
    }
    if($_POST['table']=='user'){
        $admin->addUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
    }
    if($_POST['table']=='posts'){
        $admin->addPost($_POST['image'], $_POST['name'], $_POST['userId'], $_POST['description']);
    }

    header('location: admin.php?selectedTable='.$_POST['table']);
?>