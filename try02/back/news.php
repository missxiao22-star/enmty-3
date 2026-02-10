
<form action="./api/post.php" method="post">
    <table class="ct" style="width:70%; margin:auto;">
        <tr>
            <td style="width:10%">編號</td>
            <td style="width:70%">標題</td>
            <td style="width:10%">顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $total=$Post->count();
        $div=3;
        $pages=ceil('p')??1;
        $start=($now-1)*$div;

        $posts=$Post->all(" limit $start,$div");
        foreach($posts as $idx => $post):
        ?>
            <tr>
                <td><?=$idx+1+$start;?></td>
                <td><?= $post['title']?></td>
                <td><input type="checkbox" name="sh[]" value="<?=($post['sh']==1)?'checked':''?>"></td>
                <td><input type="checkbox" name="del[]" value="<?=$post['id'];?>"></td>
                <td><input type="hidden" name="id[]" value="<?=$post['id'];?>"></td>
            </tr>
            <?php endforeach;?>
    </table>

<div class="ct">
    <?php
    if($now-1>0){
        $prev=$now-1;
        echo "<a href='?do=news&p=$prev'> > </a>";
    }
    for($i=1;$i<=$pages;$i++){
        $font=($i==$now)?"24px":"16px";
        echo "<a href='?do=news&p=$i' style='font-size:$font'> $i </a>";
    }
    if($now+1<=$pages){
        $next=$now+1;
        echo "<a href='?do=news&p=$next'> < </a>";
    }
    ?>
</div>

<div class="ct"><input type="submit" value="確定修改"></div>

</form>