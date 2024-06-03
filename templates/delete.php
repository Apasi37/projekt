<?php
require_once('../_inc/classes/Database.php');
require_once('../_inc/classes/Admin.php');
session_start();
if(isset($_POST['delete'])){
    $admin = new Admin();
    $admin->deleteRow($_POST['table'],$_POST['id']);
    header('location: admin.php');
}
?>