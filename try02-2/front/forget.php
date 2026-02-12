
<form action="">
    <table>
        <tr>
            <td>請輸入信箱找密碼</td>
        </tr>
        <tr>
            <td><input type="email" id="email"></td>
        </tr>
        <tr>
            <td id="tip"></td>
        </tr>
        </tr>
        <tr>
            <td><input type="button" value="尋找" onclick="chk_email()"></td>
        </tr>
        
    </table>
</form>

<script>
    function chk_email(){
        let email = $("#email").val();

        $.post("./api/email.php",{email},function(res){
            $('#tip').text(res);
        })
    }
</script>
