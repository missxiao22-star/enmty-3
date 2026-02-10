<?php 
//會員登入頁面
//建構表格
//會員登入按鈕方法
?>
<fieldset style="width:300px;margin:auto;">

<legend>會員登入</legend>

<form action="./api/chk_pw.php" method="post">
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
         <tr>
            <td>
                <input type="button" value="登入" onclick="login()">
                <input type="reset" value="清除">
            </td>
            <td>
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</form>

</fieldset>

<?php

?>

<script>
    function login(){
        let user={acc:$("#acc").val(),$pw:$("#pw").val()}
        $.get('./api/chk_acc.php',user,(chkacc)=>{
            if(parseInt(chkacc)){
                $.get('./api/chk_pw.php',user,(chkpw)=>{
                    console.log(chkpw);
                    if(parseInt(chkpw)){
                        if(user.acc=='admin'){
                            location.href="back.php";
                        }else{
                            location.href="index.php";
                        }
                    }else{
                        alert('密碼錯誤');
                    }
                })
            }else{
                alert('查無帳號');
            }
        })
    }
</script>