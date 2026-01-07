<?php //新增網站標題圖片-按鈕顯示頁面 
?>

<div class="cent">新增管理者帳號</div>
<hr>
<form action="./api/insert.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號:</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td>密碼:</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>確認密碼:</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td></td>
        </tr>
    </table>
</form>