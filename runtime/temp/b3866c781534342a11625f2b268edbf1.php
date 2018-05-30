<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp\www\Blogs\public/../application/admin\view\index\login.html";i:1517964530;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录界面</title>
    <style>
        .div_log{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="div_log">
    <form action="./login" method="post">
        <p><input type="text" name="name" placeholder="用户名"></p>
        <p><input type="password" name="pwd" placeholder="密码"></p>
        <p><input type="submit" value="登录"></p>
    </form>
</div>
</body>
</html>