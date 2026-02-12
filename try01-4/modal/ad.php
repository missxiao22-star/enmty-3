<div class="cent">新增動態文字廣告</div>
<hr>
<form action="./api/insert.php?table=<?= $_GET['table'] ?>" method="post" style="margin:auto;width:60%" enctype="multipart/form-data">
    <table>
        <div>
            動態文字廣告:<input type="text" name="text">

        </div>
        <div>
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </table>
</form>