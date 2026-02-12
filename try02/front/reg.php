<?php 
//尚未註冊頁面
//建構表格
//尚未註冊按鈕方法
?>
<fieldset style="width:350px;margin:auto;">

    <legend>會員註冊</legend>

    <div style="color:red">*請設定您要註冊的帳號及密碼(最常12個字元)</div>

    <form action="./api/reg.php" method="post">
        <table>
            <tr>
                <td>step1:登入帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>step2:登入密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>step3:再次確認密碼</td>
                <td><input type="password" name="pw" id="pw2"></td>
            </tr>
            <tr>
                <td>step4:信箱(忘記密碼時使用)</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
             <tr>
                <td>
                    <input type="button" value="註冊" onclick='reg()'>
                    <input type="reset" value="清除">
                </td>
            </tr>
        </table>
    </form>

</fieldset>

<?php
//寫一個判斷帳號密碼及不能空白的方法
//如果使用者的所有欄位都不是空的就執行
//如果使用者打的密碼欄位跟確認密碼是一樣的資料就執行

//ajax(資料到這個檔案，
//帶甚麼資料過去，
//chk_acc.php echo甚麼，傳甚麼回來(最終資料存進這，此名稱是自訂的)後端傳給前端  
//=>{資料回來之後做甚麼事})

//印出chk  
//如果chk不是數字(parseInt:將接收到的字串解析找整數且輸出數字)就執行
//$.post(資料傳送到哪裡處理，傳送甚麼資料過去)
?>
<script>
    function reg(){
        let user={
            'acc':$("#acc").val(),
            'pw':$("#pw").val(),
            'pw2':$("#pw2").val(),
            'email':$("#email").val(),
        }
        if(user.acc !='' && user.pw !='' && user.pw2 !='' && user.email !=''){
            if(user.pw == user.pw2){
                $.get('./api/chk_acc.php',{'acc':user.acc},(chk)=>{
                    console.log(chk);
                    if(!parseInt(chk)){
                        $.post("./api/reg.php",user,(res)=>{
                            console.log(res);
                            alert("註冊成功，歡迎加入")
                            $("form").trigger('reset');
                        })
                    }else{
                        alert('帳號重複');
                    }
                })
            }else{
                alert('密碼錯誤');
            }
        }else{
            alert('不可空白');
        }

    }
</script>