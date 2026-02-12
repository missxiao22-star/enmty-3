<?php
    //寫一個判斷input name img 裡面是否有tmp_name 檔案路徑
    //如果有就搬運照片的位置
    //將搬運完的照片位置存進POST的img欄位裡面
    //撈出sh=1的資料
    //算出最大的id且+1，存進post rank裡面
    //隨機抽出，有1-3個數字，將結果存進post ani
    //將所有結果存進post
    if(!empty($_FILES['img']['tmp_name'])){
        move_uploaded_file($_FILES['img']['tmp_name'],"../upload/{$_FILES['img']['name']}");
        $_POST['img']=$_FILES['img']['name'];
        $_POST['sh']=1;
        $_POST['rank']=$Poster->max('id')+1;
        $_POST['ani']=rand(1,3);

        $Poster->save($_POST);
    }
?>