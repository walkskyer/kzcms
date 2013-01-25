<script src="static/js/frame.js" language="javascript" type="text/javascript"></script>
<link href="static/css/frame.css" rel="stylesheet" type="text/css">
<!--[if IE]>
<style type="text/css" media="screen">
    .right{height:100%; top:0; bottom:0; border-top:66px solid #d0e6f1; border-bottom:0px solid #d0e6f1; z-index:1;}
</style>
<![endif]-->
<div class="pagemask"></div>
<iframe class="iframemask"></iframe>
<div class="allmenu">
    <div class="allmenu-box">
    </div>
</div>
<div class="head">
    <div class="top">
        <div class="top_logo"> <img src="static/images/admin_top_logo.gif" alt="DedeCms Logo" title="Welcome use DedeCms" height="37" width="170"> </div>
        <div class="top_link">
            <ul>
                <li class="welcome">您好：admin,欢迎登陆！</li>
                <li><a href="http://127.0.0.1:90/dede/index_body.php" target="main">系统主页</a></li>
                <li><a href="http://127.0.0.1:90/index.php?upcache=1" target="_blank">网站主页</a></li>
                <li><a href="http://127.0.0.1:90/member" target="_blank">会员中心</a></li>
                <li><a href="http://127.0.0.1:90/dede/exit.php" target="_top">注销</a></li>
            </ul>
            <div class="quick"> <a href="#" class="ac_qucikmenu" id="ac_qucikmenu">快捷方式</a> <a href="#" class="ac_qucikadd" id="ac_qucikadd">
                <!--ADD-->
            </a> </div>
        </div>
    </div>
    <div class="topnav">
        <div class="menuact">
            <a href="#" id="togglemenu">隐藏菜单</a>
            <!--a href="#" id="allmenu">功能地图</a-->
        </div>
        <div class="nav" id="nav">
            <ul>
                <?php
                    foreach($menuList as $v){
                        echo  ' <li><a class="" href="'.$v['href'].'" _for="'.$v['_for'].'" target="main">'.$v['itemname'].'</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<div class="left">
    <div class="menu" id="menu">
        <?php
          $i=0;
          foreach($menuList as $value){ $i++;
              ?>
                  <div style="display:<?php echo $value['display']?>;" id="items_<?php echo $value['_for']?>">
                      <dl id="dl_items_1_<?php echo $i;?>">
                          <dt><?php echo $value['itemname'];?></dt>
                          <dd><ul>
                              <?php   foreach($value['childs'] as $child){

                                echo '<li><a class="" href="'.$child['url'].'" target="main">'.$child['name'].'</a></li>';

                               } ?>
                          </ul></dd>
                      </dl>
                      <!-- Item 2 End -->
                  </div>
           <?php   }?>

    </div>
</div>
<div class="right">
    <div class="main">
        <iframe id="main" name="main" src="<?php echo site_url('/manage/admin/indexmain')?>" frameborder="0"></iframe>
    </div>
</div>
<div class="qucikmenu" id="qucikmenu">
    <ul>
        <li><a href="http://127.0.0.1:90/dede/content_list.php" target="main">文档列表</a></li>
        <li><a href="http://127.0.0.1:90/dede/feedback_main.php" target="main">评论管理</a></li>
        <li><a href="http://127.0.0.1:90/dede/catalog_main.php" target="main">栏目管理</a></li>
        <li><a href="http://127.0.0.1:90/dede/sys_cache_up.php" target="main">更新系统缓存</a></li>
        <li><a href="http://127.0.0.1:90/dede/sys_info.php" target="main">修改系统参数</a></li>
    </ul>
</div>