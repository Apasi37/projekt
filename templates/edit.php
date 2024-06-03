<?php
    require_once('../_inc/classes/Database.php');
    require_once('../_inc/classes/Admin.php');

    $admin = new Admin();
    if($_POST['table']=='comments'){
        $data = array(
            'comment' => $_POST['comment'],
            'userId' => $_POST['userId'],
            'postId' => $_POST['postId']
        );
        $admin->editComment($_POST['editid'],$data);
    }
    if($_POST['table']=='user'){
        $data = array(
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'role' => $_POST['role']
        );
        $admin->editUser($_POST['editid'],$data);
    }
    if($_POST['table']=='posts'){
        $data = array(
            'image' => $_POST['image'],
            'name' => $_POST['name'],
            'userId' => $_POST['userId'],
            'description' => $_POST['description']
        );
        $admin->editPost($_POST['editid'],$data);
    }

    header('location: admin.php?selectedTable='.$_POST['table']);
?>