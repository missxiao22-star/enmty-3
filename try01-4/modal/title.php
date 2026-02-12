<div class="cent">新增標題區圖片</div>
<hr>
<form action="./api/insert.php?table=<?= $_GET['table'] ?>" method="post" style="margin:auto;width:60%" enctype="multipart/form-data">
    <table>
        <div>
            標題區圖片:<input type="file" name="img" id="">

        </div>
        <div>
            標題區替代文字:<input type="text" name="text" id="">

        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </table>
</form>