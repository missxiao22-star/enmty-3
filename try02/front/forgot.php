<?php 
//忘記密碼頁面
//建構表格
//忘記密碼按鈕方法
?>
<fieldset style="width:250px;margin:auto;">

<legend>忘記密碼</legend>

<form action="./api/forgot.php" method="post">
    <div>輸入信箱以查詢密碼</div>
    <div><input type="email" name="email" id="email"></div>
    <div id="result"></div>
    <div><input type="button" value="尋找" onclick="forgot()"></div>
</form>

</fieldset>
<?php

?>
<script>
    function forgot(){
        let email= $("#email").val();
        $.get("./api/chk_email.php",{email},(res)=>{
            $("#result").text(res);
        })
    }
</script>