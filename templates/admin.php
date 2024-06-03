<?php
include_once('partials/header.php');
require_once('../_inc/classes/Admin.php');

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("location: home.php");
}

if(isset($_GET['selectedTable'])){
    $selectedTable = $_GET['selectedTable'];
}else{
    $selectedTable = "posts";
}

$admin = new Admin();
$tables = $admin->showTables();
$rows = $admin->selectTable($selectedTable);
if($rows != null){
    $columns = array_keys($rows[0]);
    $columnsCount = count($columns);
}else{
    $columns = 0;
    $columnsCount = 0;
}
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
                for($i=0;$i<$columnsCount;$i++){
                    echo('<th class="admin_column">'.$columns[$i].'</th>');
                }
            ?>
            <th><button type="button" onclick="toggleAdd()">Add</button></th>
        </tr>

        <?php
            for($i=0;$i<count($rows);$i++){

                echo('<tr>');

                for($j=0;$j<$columnsCount;$j++){
                    echo('<th class="admin_row">'.$rows[$i][$columns[$j]].'</th>');
                }
                
                echo('
                    <th><button type="button" onclick="toggleEdit('.$rows[$i][$columns[0]].')">Edit</button></th>
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

<div id="admin_add">
    <form method="POST" action="add.php">
        <?php
            echo('<div>Adding into table: '.$selectedTable.'</div>');
            echo('<input type="hidden" name="table" value="'.$selectedTable.'">');
            for($i=1;$i<count($columns);$i++){
                echo('
                    <label for="'.$columns[$i].'">'.$columns[$i].'</label>
                    <input type="text" name="'.$columns[$i].'" value="" required>
                ');
            }
        ?>
        <input type="submit" name="add" value="Add">
    </form>
</div>

<div id="admin_edit">
    <form method="POST" action="edit.php">
        <input type="hidden" id="editid" name="editid" value="">
        <?php
            echo('<div>Updating in table: '.$selectedTable.', row id: <div id="editInfo"></div></div>');
            echo('<input type="hidden" name="table" value="'.$selectedTable.'">');
            for($i=1;$i<count($columns);$i++){
                echo('
                    <label for="'.$columns[$i].'">'.$columns[$i].'</label>
                    <input type="text" name="'.$columns[$i].'" value="">
                ');
            }
        ?>
        <input type="submit" name="edit" value="Edit">
    </form>
</div>

<div id="overlay" onclick="overlayOff()"></div>

<?php
    include_once('partials/footer.php');
?>