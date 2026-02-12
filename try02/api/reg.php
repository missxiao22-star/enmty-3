<?php
include_once "db.php";
unset($_POST['pw2']);
echo $Mem->save($_POST);
// print_r($Mem);
// dd($Mem);
?>
