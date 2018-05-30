<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\wamp\www\Blog\public/../application/admin\view\index\menu.html";i:1513756642;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>左侧导航</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="_JS_/jquery.js"></script>
<script src="_JS_/public.js"></script>
</head>
<body style="background:#313131">
<div class="menu-list">
 <a href="main.html" target="mainCont" class="block menu-list-title center" style="border:none;margin-bottom:8px;color:#fff;">起始页</a>
 <ul>
  <li class="menu-list-title">
   <span>管理</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children" >
    <li><a href="../Admin/article_list?biao=article_qian" title="前端" target="mainCont">前端</a></li>
    <li><a href="../Admin/article_list?biao=article_php" title="php" target="mainCont">php</a></li>
    <li><a href="../Admin/article_list?biao=article_mysql" title="mysql" target="mainCont">mysql</a></li>
    <li><a href="../Admin/article_list?biao=article_linux" title="linux" target="mainCont">linux</a></li>
    <li><a href="../Admin/article_list?biao=article_blog" title="博客制作" target="mainCont">博客制作</a></li>
    <li><a href="../Admin/article_list?biao=article_zatan" title="杂谈" target="mainCont">杂谈</a></li>
   </ul>
  </li>
  <li class="menu-list-title">
   <span>添加</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children" >
    <li><a href="../Admin/add_article" title="添加" target="mainCont">添加文章</a></li>
    <li><a href="../Admin/hui_article?biao=article_qian" title="回收站" target="mainCont">回收站</a></li>

   </ul>
  </li>
  <li class="menu-list-title">
   <span>管理员</span>
   <i>◢</i>
  </li>
  <li>
   <ul class="menu-children" >
    <li><a href="../Admin/privilege" title="管理员权限设置" target="mainCont">管理员权限设置</a></li>
    <li><a href="../Admin/add_user" title="管理员添加" target="mainCont">管理员添加</a></li>
   </ul>
  </li>
  
    
 </ul>
</div>

</body>
</html>