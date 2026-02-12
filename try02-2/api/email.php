<?php
    include_once "db.php";

    $data=$Member->find(['email'=>$_POST['email']]);

    if($data){
        echo "你的密碼為:".$data['pw'];
    }else{
        echo "查無此資料";
    }


?>