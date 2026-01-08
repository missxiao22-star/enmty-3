<!-- 更換圖片按鈕介面 -->
<?php
include "db.php";
$table=$_GET['table'];
$db= ${ucfirst($table)};


$row = $db -> find($_GET['id']);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../uplode/{$_FILES['img']['name']}");
    $row['img'] = $_FILES['img']['name'];
}

$db->save($row);

to("../back.php?do={$table}");
?>