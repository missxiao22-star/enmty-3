<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div><label>問卷名稱</label><input type="text" name="subject"></div>
        <div id="options"></div>
        <div><label>選項</label><input type="text" name="opt[]"><input type="button" value="更多" onclick="more()"></div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more(){
    let op=`<div>
            <label>選項</label>
            <input type="text" name="opt[]">
            <input type="button" value="更多" onclick="more()">
            </div>`
    $("#options").prepend(opt);
    }
</script>