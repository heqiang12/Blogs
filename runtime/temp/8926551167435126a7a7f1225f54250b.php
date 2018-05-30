<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\Blogs\public/../application/admin\view\index\top.html";i:1517964611;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>header</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="header">
 <div class="logo">
  <img src="_IMG_/admin_logo.png" title="在哪儿"/>
 </div>
 <div class="fr top-link">
  <a href="#" target="_blank" title="访问站点"><i class="shopLinkIcon"></i><span>访问站点</span></a>
  <a href="../Admin/editxx" target="mainCont" title=""><i class="adminIcon"></i><span>管理员:<?php echo $name; ?></span></a>
  <a href="" title="清除缓存"><i class="clearIcon"></i><span>清除缓存</span></a>
  <!--<a href="" target="mainCont" title="编辑个人信息"><i class="revisepwdIcon"></i><span>编辑个人信息</span></a>-->
  <a href="#" title="安全退出" style="background:rgb(60,60,60);"><i class="quitIcon"></i><span>安全退出</span></a>
 </div>
</div>
</body>
</html>