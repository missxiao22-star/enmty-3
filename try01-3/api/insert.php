<?php
//新增檔案-api

//引入資料庫資料
//給資料，用GET抓到的table資料
//抓物件資料使用，將字串第一個字大寫

//判斷使否有圖片檔案
//將檔案搬運到指定地點../upload/".$_FILES['img']['name']
//將搬運好的資料存進$_POST['img']

//判斷table資料表，且執行指令


//存取所有更動的資料回DB

//跳轉畫面到../back.php?do=$table
?>

<?php
include_once "db.php";
$table=$_GET['table'];
$DB=${ucfirst($table)};

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

switch($table){
    case "title":
        $_POST['sh'] = ( $DB->count(['sh'=> 1])==0)?1:0;
    break;
    default:
         if($table!='admin'){
            $_POST['sh']= 1;
         }
}

$DB->save($_POST);

to("../back.php?do=$table");
?>