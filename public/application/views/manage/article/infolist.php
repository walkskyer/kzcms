<?php /* @var $this article*/?>
<table _dlist="line check" class="tlist">
    <thead>
    <tr>
        <td colspan="7">
            <div class="title"><strong>列表 - 自定义资料</strong></div>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th align="left" width="6%">ID</th>
        <th align="left" width="4%">选择</th>
        <th align="left" width="28%">文章标题 </th>
        <th align="left" width="10%">录入时间 </th>
        <th align="center" width="10%">操作</th>
    </tr>
<?php
  /* @array  $infolist */
if(count($infolist)){
     foreach($infolist as $obj):  ?>

     <tr class="">
         <td><?php echo $obj->aid;?></td>
         <td class="td_chk"><?php echo form_checkbox('chk[]',$obj->aid)?></td>
         <td><?php echo $obj->title.time();?></td>
         <td><?php echo date('Y-m-d',$obj->uptime);?></td>
         <td align="center"><a href="">[删除]</a><a href="">[编辑]</a></td>
     </tr>

<?php
     endforeach;
    }else{
        echo '<tr class="">暂无数据</tr>';
    }
?>    </tbody>
    <tfoot>
    <tr>
        <td colspan="7">
            <button type="button" class="btn1s"  onclick="allSelect()">全选</button>
            <button type="button" class="btn1s"  onclick="unSelect()">反选</button>
            <button class="btn1s" type="button" onclick="">删除</button>
        </td>
    </tr>
    </tfoot>
     </table>
<?php

     $this->load->view('page');
?>

<script type="text/javascript">
    //全选
    function  allSelect(){
        $('.td_chk :checkbox').attr('checked',true);
    }
    //反选
    function unSelect(){
        $('.td_chk :checkbox').attr('checked',false);
    }
    //删除
    function del(){

    }


</script>