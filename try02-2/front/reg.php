<fieldset>
    <legend>會員註冊</legend>
    <p style="color:red">*請設定您要註冊的帳號及密碼( 最長12個字元 )</p>
    <form action="">
        <table>
            <tr>
                <td>step1:登入帳號<input type="text" name="acc" id="acc" value=""></td>
            </tr>
            <tr>
                <td>step2:登入密碼<input type="password" name="pw" id="pw" value=""></td>
            </tr>
            <tr>
                <td>step3:再次確認密碼<input type="password" name="pw2" id="pw2" value=""></td>
            </tr>
            <tr>
                <td>step4:信箱(忘記密碼時使用)<input type="email" name="email" id="email" value=""></td>
            </tr>
        </table>
        <div>
            <input type="button" value="註冊" onclick="reg()">
            <input type="reset" value="清除">
        </div>
    </form>
</fieldset>
<script>
    function reg(){
        console.log("案到註冊");
        let user ={
            'acc':$('#acc').val(),
            'pw':$('#pw').val(),
            'pw2':$('#pw2').val(),
            'email':$('#email').val(),
        }
        console.log(user);

        if(!user.acc || !user.pw || !user.pw2 || !user.email){
            alert("不可空白")
            return
        }

        if(user.pw != user.pw2){
            alert("密碼錯誤")
            return
        }

        $.post("./api/acc.php",user,function(res){
            if(res ==1){
                alert("帳號重複")
                return    
            }
            $.post("./api/reg.php",user,function(res){
                alert("註冊完成，歡迎加入");
                location.href="?do=login";
            })
        })
    }
</script>