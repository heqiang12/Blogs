<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp\www\Blogs\public/../application/index\view\index\main_list.html";i:1514014390;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表</title>
    <link rel="stylesheet" href="_CSS_/parse.css" >
    <link rel="stylesheet" href="_CSS_/qianlist.css" >
</head>
<body>
    <ul>
        <?php if(is_array($Info) || $Info instanceof \think\Collection || $Info instanceof \think\Paginator): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <li class="vo_title"><?php echo $vo['arti_title']; ?></li>
        <li class="vo_con"><p><?php echo $vo['arti_contents']; ?></p></li>
        <li><?php echo $vo['ad_time']; ?><spqn class="clicks">阅读：</spqn><?php echo $vo['clicksum']; ?></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</body>
</html>