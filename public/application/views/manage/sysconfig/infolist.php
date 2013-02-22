 <form method="post">
        <table  width="98%" border="0" cellpadding="2" cellspacing="1"  align="center" class="content_tab">
            <tr class="th"><th width="20%">变量名称</th><th>变量值</th><th width="30%">描述信息</th></tr>
            <?php   foreach($infolist as $key=>$value):?>
            <tr class="<?php echo  ($key%2)?'old':'even';?>">
                <td><?php echo $value->varname;?></td>
                <td style="text-align: center;">
                    <?php
                           $data=array(
                             'class'=>'txt',
                             'name'=>'val[]',
                             'value'=>$value->value
                           );
                       echo form_hidden('aid[]',$value->aid);
                       switch($value->type){
                           case 'text':
                               echo form_textarea($data);break;
                           default:
                               echo form_input($data);break;
                       }
                    ?>
                </td>
                <td><?php echo $value->info;?></td>
            </tr>
            <?php endforeach;?>
            <tr class="center"><td colspan="4">
                <input type="submit" value="保存" class="btn">&nbsp;
                <input type="reset" value="取消" class="btn"/>&nbsp;
                <input type="button"  class="btn" value="添加新变量" onclick="skip('<?php echo site_url("manage/sysconfig/add")?>')"></td></tr>
        </table>

    </form>
