<?php
include_once('partials/header.php');
require_once('../_inc/classes/Posts.php');

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("location: home.php");
}

if(isset($_GET['selectedTable'])){
    $selectedTable = $_GET['selectedTable'];
}else{
    $selectedTable = "posts";
}

$posts_class = new Posts();
$tables = $posts_class->showTables();
$rows = $posts_class->selectTable($selectedTable);
$columns = array_keys($rows[0]);
?>

<div id="admin_panel">

    <form method="GET" id="admin_tables">
        <h1>Tables</h1>
        <?php
            for($i=0;$i<count($tables);$i++){
                echo('<input type="submit" name="selectedTable" value="'.$tables[$i].'" >');
            }
        ?>
    </form>

    <table id="admin_tableContent">

        <tr>
            <?php
                for($i=0;$i<count($columns);$i++){
                    echo('<th class="admin_column">'.$columns[$i].'</th>');
                }
            ?>
        </tr>

        <?php
            for($i=0;$i<count($rows);$i++){

                echo('<tr>');

                for($j=0;$j<count($columns);$j++){
                    echo('<th class="admin_row">'.$rows[$i][$columns[$j]].'</th>');
                }
                
                echo('
                    <th><div class="aButton">Edit</div></th>
                    <th>
                        <form method="POST" action="delete.php">
                            <input type="submit" name="delete" value="Delete">
                            <input type="hidden" id="table" name="table" value="'.$selectedTable.'">
                            <input type="hidden" id="id" name="id" value="'.$rows[$i][$columns[0]].'">
                        </form>
                    </th>
                ');

                echo('</tr>');

            }
        ?>

    </table>
</div>

<div id="admin_popup">
    <form action="">
        <input type="text">
    </form>
</div>

<div id="admin_popup">
    <form method="POST" action="edit.php">
        <label for=""></label>
        <input type="text" name="" id="">
        <input type="submit" value="Edit">
    </form>
</div>


<?php

    include_once('partials/footer.php');
?>