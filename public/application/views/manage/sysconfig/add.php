<form method="post" onsubmit="return chkfrm()">
        <table class="content_tab">
            <tr>
                <td class="center">变量名称</td>
                <td class="indent"><input type="text" name="varname" id="varname">&nbsp;<span class="note">EX:cfg_name</span></td>
                <td  class="center">变量值</td>
                <td class="indent"><input type="text" name="value" id="value"></td>
            </tr>
            <tr>
                <td  class="center">参数类型</td>
                <td class="indent">
                <input type="radio" name="type" value="string" checked="true">字符串
                <input type="radio" name="type" value="text">文本类型
                </td>
                <td  class="center">参数说明</td><td class="indent"><input type="text" name="info"></td>
            </tr>
        </table>
        <p align="center">
            <input type="submit"  value="保存变量" class="btn">&nbsp;
            <input type="button"  value="返回" class="btn" onclick="skip('<?php echo site_url(CFG_CMSPATH.'sysconfig/infolist')?>')">
        </p>
    </form>
 <script type="text/javascript">
    function chkfrm(){
        if(!$('#varname').val()){alert('变量名称不允许为空');return false;}
        if(!$('#value').val()){alert('变量值不允许为空');return false;}
    }

 </script>
