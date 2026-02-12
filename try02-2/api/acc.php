<?php
    include_once "db.php";

    $is_check =$Member->count(['acc'=>$_POST['acc']]);

    echo $is_check;

?>