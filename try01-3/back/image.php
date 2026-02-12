<?php //main區的顯示區?>

<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./back/edit.php?table=<?=$do?>">
        <table width="100%">
            <tbody>

                <tr class="yel">
                    <td width="45%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows=$Image->all();
                foreach($rows as $row):
                ?>
                 <tr>
                    <td width="45%">
                        <img src="./uplode/<?=$row['img'];?>" style="width:300px;height:30px;">
                    </td>
                    <td width="7%">
                        <input type="radio" name="sh" value="<?=$row['id'];?>" <?= ($row['sh']== 1)?"checked":""; ?>>
                    </td>
                    <td width="7%">
                        <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                    </td>
                    <td>
                        <input type="button" value="更新圖片"
                            onclick="op('#cover','#cvr','./modal/update.php?table=<?=$do;?>&id=<?=$row['id']?>')">
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button"
                               onclick="op('#cover','#cvr','./modal/<?=$do?>.php?table=<?=$do?>')"
                               value="新增校園映像圖片">
                        </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>