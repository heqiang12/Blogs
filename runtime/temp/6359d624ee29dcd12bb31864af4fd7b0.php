<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp\www\Blogs\public/../application/admin\view\admin\add_user.html";i:1513397429;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>添加新会员</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="_JS_/jquery-1.11.3.min.js"></script>
<script>
$(function(){
  $(".span-name").hide();
  $("#admin_name").change(function(){
    if($("#admin_name").val().match(/^[0-9a-zA-Z_\u4E00-\u9FA5]{2,8}$/)){
        $(".span-name").hide("3000");
    }else{
        $(".span-name").show("3000").css("color","red").css("text-indent","1em");
        
    }
  });

  $(".span-email").hide();
  $("#admin_email").blur(function(){
    if($("#admin_email").val().match(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/)){
        $(".span-email").hide("3000");
    }else{
        $(".span-email").show("3000").css("color","red").css("text-indent","1em");
    }
  });

  $("#admin_pwd").blur(function(){
    if($("#admin_pwd").val().match(/^[0-9]+$/)){
      $(".span-pwd").html("密码强度：弱").css("color","#FF8000");
    }
    else if($("#admin_pwd").val().match(/^[a-zA-Z]+$/)){
      $(".span-pwd").html("密码强度：弱").css("color","#FF8000");
    }
    else if($("#admin_pwd").val().match(/^[a-zA-Z0-9]+$/)){
      $(".span-pwd").html("密码强度：中等").css("color","#A5DF00");
    }
    else if($("#admin_pwd").val().match(/^[a-zA-Z0-9_!@#$%]+$/)){
      $(".span-pwd").html("密码强度：强").css("color","green");
    }
  });
  $(".span-phone").hide();
  $("#admin_phone").blur(function(){
    if($("#admin_phone").val().match(/^[0-9]{11}$/)){
        $(".span-phone").hide("3000");
    }else{
        $(".span-phone").show("3000").css("color","red").css("text-indent","1em");
    }
  });

})

  function formpost(){
    var phone=$(".span-phone").is(":visible");
    var name=$(".span-name").is(":visible");
    var email=$(".span-email").is(":visible");
    if(phone||name||email||$("#admin_phone").val()==""||$("#admin_name").val()==""||$("#admin_email").val()==""){
      alert("抱歉！您填写的信息格式有误！");
    }else{
      var formdata= $("#myform").serialize();
    $.ajax(
        {
          type:"post",
          url:"<?php echo url('Admin/add_user'); ?>",
          dataType:"json",
          data:formdata,
          success:function(data){
            if(data=="success"){
              alert("添加成功！");
            }else{
              alert("添加失败！");
            }
           // console.log(data);
           
          }
        }
      );
  }
    }

    

  
</script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i class="add_user"></i><em>添加新管理员</em></span>
  </div>
  <form id="myform">
  <table class="list-style">
   <tr>
    <td style="width:15%;text-align:right;">管理员昵称：</td>
    <td><input type="text" class="textBox length-middle" name="admin_name" id="admin_name"/><span class="span-name" style="display:inline-block;text-indent:1em">  昵称应为2-8位数字，字母，下划线，中文</span></td>
   </tr>
   <tr>
    <td style="text-align:right;">管理员邮箱：</td>
    <td><input type="text" class="textBox length-middle" name="admin_email" id="admin_email"/><span class="span-email">email格式不正确！</span></td>
   </tr>
   <tr>
    <td style="text-align:right;">设置密码：</td>
    <td><input type="password" class="textBox length-middle" name="admin_pwd" id="admin_pwd"/><span class="span-pwd" style="display:inline-block;text-indent:1em">使用数字，字母，特殊字符组合安全性更高哦！</span></td>
   </tr>
   <tr>
    <td style="text-align:right;">手机号码：</td>
    <td ><input type="text" class="textBox length-middle" name="admin_phone"
    id="admin_phone"/><span class="span-phone" style="display:inline-block;text-indent:1em">手机号为11位！</span></td>
   </tr>
   <tr>
    <td style="text-align:right;"></td>
    <td><input type="button" class="tdBtn" value="添加新管理员" id="admin_submit" onclick="formpost()"/></td>
   </tr>
  </table>
  </form>
 </div>
</body>
</html>



