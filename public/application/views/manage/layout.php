<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>企业信息管理系统</title>
    <base href="<?php echo base_url(); ?>">
    <link type="text/css" rel="stylesheet" href="static/css/table.css">
    <script src="static/js/jquery/jquery.js"  type="text/javascript"></script>
    <script src="static/js/manage.js"  type="text/javascript"></script>
</head>
<body>
<div class="mtitle"><?php   echo isset($mtitle)?$mtitle:'网站主页';?></div>
<?php
  echo $content;
?>
<script type="text/javascript">
    <?php echo  (isset($msg))?"alert(\"{$msg}\")":''  ?>
</script>
</body></html>