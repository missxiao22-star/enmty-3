<?php
//<新增功能-將modal傳來的資料寫入資料庫>
//先引入檔案，撈資料表檔案，將資料轉換成大寫存進DB內
//判斷資料是否有路徑(tmp_name)，將資料搬運到指定地點，將處理好的資料存回post的img
//處理顯示問題，先預設所有新增的都為0不顯示，若有勾選才顯示(1)->勾選怎麼判斷會寫在edit.php檔案裡
//所有變動後資料存進DB
//所有步驟結束後強制跳轉到$table頁面
?>
<?php
include "db.php";
$table=$_GET['table'];
$db= ${ucfirst($table)};

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../uplode/{$_FILES['img']['name']}");
    $_POST['img'] = $_FILES['img']['name'];
}
switch($table){
    
    case 'title':
        $_POST['sh'] = 0;
    break;

    case 'admin':
    break;
    
    default:
        $_POST['sh'] = 1;
    break;
}

$db->save($_POST);

to("../back.php?do={$table}");
?>