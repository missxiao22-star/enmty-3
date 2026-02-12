<fieldset class="ct" style="width:60%;">
    <legend>會員登入</legend>
    <form action="">
        <table>
            <tr>
                <td>帳號<input type="text" name="" id="acc"></td>
            </tr>
            <tr>
                <td>密碼<input type="password" name="" id="pw"></td>
            </tr>
        </table>
        <div>
            <input type="button" value="登入" onclick="login()">
            <input type="reset" value="清除">
            <a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a>
        </div>
    </form>
</fieldset>
<?php
    //寫一個登入判斷的方法，可以判斷帳密是否對，及是否為管理者

    //先從html抓取使用者輸入的帳號&密碼

    //將資料送到後端，查看資料庫使否有這個帳號

    //使用post方法撈資料，從這個網址撈user資料，並回傳撈到的資料給function
    //先log出來看是否有撈到user資料，如果沒有就資料就執行
    //判斷回傳的資料是否為0，是的話就跳出視窗查無帳號
    //先宣告帳號&密碼

    //使用post方法撈資料，從這個網址撈user資料，並回傳撈到的資料給function
    //判斷回傳的資料是否為0，是的話就跳出視窗密碼錯誤
    //接著判斷user的帳號是否等於欄位admin
    //是的話就回到後台，不是就回到首頁(僅管理者可以進入後台)

?>
<script>
    function login(){
        let user={
            'acc':$('#acc').val(),
            'pw':$('#pw').val(),
        }
        $.post("./api/acc.php",user,function(res){
            console.log(!res);
            if(res ==0){
                alert("查無帳號")
                return
            }

            $.post("./api/pw.php",user,function(res){
                if(res ==0){
                    alert("密碼錯誤")
                    return
                }
                if(user.acc == 'admin'){
                    location.href="back.php";
                }else{
                    location.href="index.php";
                }
            })
        })
    }
</script>