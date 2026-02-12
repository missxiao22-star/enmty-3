<?php
switch ($table){
    case 'title':
        $h3="更新標題區圖片";
        $label="標題區圖片";
        break;
    case 'mvim':
        $h3="更換動畫圖片";
        $label="動畫圖片";
        break;
    default:
        $h3="更換校園映像圖片";
        $label="校園映像圖片";
        break;    
}

?>


<h3 class="cent"> <?= $h3?></h3>
<hr>
<form action="./api/update.php?table=<?= $_GET['table'] ?>&id=<?= $_GET['id'] ?>" method="post" style="margin:auto;width:60%" enctype="multipart/form-data">
    <table>

        <div>
            <?=$label?>:<input type="file" name="img">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        </div>

        <div style="text-align: center">
            <input type="submit" value="更新">
            <input type="reset" value="重置">
        </div>

    </table>
</form>