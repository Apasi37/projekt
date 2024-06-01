<?php
require_once('../_inc/classes/Database.php');
require_once('../_inc/classes/Posts.php');
session_start();
if(isset($_POST['delete'])){
    $posts_class = new Posts();
    $posts_class->deleteRow($_POST['table'],$_POST['id']);
    header('location: admin.php');
}
?>