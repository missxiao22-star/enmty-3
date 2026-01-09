<?php
//存檔功能-處理後台整張表格的文字/顯示/刪除
//先引入檔案，撈資料表檔案，將資料轉換成大寫存進DB內

//點名:撈出$_POST內的id給它新的名字
//分類:判斷此id使否有刪除指令，有就刪除，若沒有被刪除就先撈就資料，再更新資料
//存檔:所有動作結束存進DB裡

//強制跳轉到指定$table頁面
?>
<?php
include "db.php";
$table=$_GET['table'];
$db= ${ucfirst($table)};
dd($_POST);
dd($table);
// foreach($_POST['id'] as $key => $id){
//     if(isset($_POST['del']) && in_array($id,$_POST['del'])){ 
//         $db->del($id);
//     }else{
//         $row = $db->find($id);
//         switch ($table){
//             case 'title':
//                 $row['text'] = $_POST['text'][$id];
//                 $row['sh'] = ($_POST['sh'] == $id)?1:0;
//                 break;
//             case 'ad':
//                 $row['text'] = $_POST['text'][$id];
//                 $row['sh'] = in_array($id,$_POST['sh'])?1:0;
//                 break;    
//             default:
//                 $_POST['sh'] = 1;
//                 break;
//         }
//         $db->save($row);
//     }
// }
// to("../back.php?do={$table}");
?>