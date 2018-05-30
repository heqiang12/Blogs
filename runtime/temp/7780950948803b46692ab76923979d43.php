<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp\www\Blogs\public/../application/admin\view\admin\privilege.html";i:1514007578;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品分类</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
 <script src="_JS_/jquery-1.11.3.min.js"></script>
 <script>
  $(function () {
      $("#del").click(function () {
          if($("#del").is(':checked')){
              $("input").prop("checked",true);
          }else{
              $("input").prop("checked",false);
          }

      });

      $("#submit").click(function () {
         $amend=$(".amend").is(":checked");
         $destory=$(".destory").is(":checked");
         $max=$(".max").is(":checked");
//         $amend="amend";
//         $destory="destory";
//         $max="max";

      var amend,destory,max;
      if($(".amend").prop("checked")){
          amend="0";
      }else{
          amend="Null";
      }
          if($(".destory").prop("checked")){
              destory="0";
          }else{
              destory="Null";
          }
          if($(".max").prop("checked")){
              max="0";
          }else{
              max="Null";
          }
      var formdata={"id":$("select").val(),"amend":amend,"destory":destory,"max":max};
         $.ajax({
             type:"post",
             url:"<?php echo url('Admin/privilege'); ?>",
             dataType:"json",
             data:formdata,
             success:function (data) {
                 if(data=="success"){
                     alert("权限设置成功！");
                 }else {
                     alert("权限设置失败！");
                 }
             }
         });
      })

      var data1={"data":$("select").val()};
      $.ajax({
          type:"post",
          url:"<?php echo url('Admin/privilege_cha'); ?>",
          dataType:"json",
          data:data1,
          success:function (data) {
              var amend=$.isNumeric(data["privilege_amend"]) ;
              var destory=$.isNumeric(data["privilege_destory"]);
              var max=$.isNumeric(data["privilege_max"]);
              $(".amend").prop("checked",amend);
              $(".destory").prop("checked",destory);
              $(".max").prop("checked",max);
              $("#hid").attr("h",data["id"]);
          }
      })

     $("select").change(function () {
         var data={"data":$("select").val()};
         $.ajax({
             type:"post",
             url:"<?php echo url('Admin/privilege_cha'); ?>",
             dataType:"json",
             data:data,
             success:function (data) {
                 var amend=$.isNumeric(data["privilege_amend"]);
                 var destory=$.isNumeric(data["privilege_destory"]);
                 var max=$.isNumeric(data["privilege_max"]);
                 $(".amend").prop("checked",amend);
                 $(".destory").prop("checked",destory);
                 $(".max").prop("checked",max);
                 $("#hid").attr("h",data["id"]);
             }
         })
     });
      $(".a_delete").click(function () {
          var data2={"data":$("#hid").attr("h"),"data2":$(".a_delete").attr("name")};
          $.ajax({
              type:"post",
              url:"<?php echo url('Admin/privilege_delete'); ?>",
              dataType:"json",
              data:data2,
              success:function (data) {
                  if(data=="success"){
                      alert("权限回收成功!");
                      $(".amend").prop("checked",false);
                  }else{
                      alert("权限回收失败！");
                  }
              }
          })
      });
      $(".d_delete").click(function () {
          var data2={"data":$("#hid").attr("h"),"data2":$(".d_delete").attr("name")};
          $.ajax({
              type:"post",
              url:"<?php echo url('Admin/privilege_delete'); ?>",
              dataType:"json",
              data:data2,
              success:function (data) {
                  if(data=="success"){
                      alert("权限回收成功!");
                      $(".destory").prop("checked",false);
                  }else{
                      alert("权限回收失败！");
                  }
              }
          })
      });
      $(".m_delete").click(function () {
          var data2={"data":$("#hid").attr("h"),"data2":$(".m_delete").attr("name")};
          $.ajax({
              type:"post",
              url:"<?php echo url('Admin/privilege_delete'); ?>",
              dataType:"json",
              data:data2,
              success:function (data) {
                  if(data=="success"){
                      alert("权限回收成功!");
                      $(".max").prop("checked",false);
                  }else{
                      alert("权限回收失败！");
                  }
              }
          })
      });
  })


 </script>
</head>
<body>
 <div class="wrap">
  <div class="page-title">
    <span class="modular fl"><i></i><em>管理员权限设置</em></span>
  </div>
  <form action="" method="post" id="myform">
   <select name="id" id="" style="height: 30px;">

    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <option value="<?php echo $vo['id']; ?>"><?php echo $vo['admin_name']; ?></option>

    <?php endforeach; endif; else: echo "" ;endif; ?>
   </select>
  <table class="list-style">
   <tr>
    <th>权限名称</th>
    <th>权限描述</th>
    <th>操作</th>
   </tr>

   <tr>
    <td>
     <input type="hidden" value="" id="hid">
     <input type="checkbox" name="privilege_amend" class="amend" />
     <span>修改</span>
    </td>
    <td class="center">可对博客内文章进行修改操作</td>
    <td class="center" ><img class="a_delete" name="privilege_amend"  src="_IMG_/icon_trash.gif"/></td>
   </tr>
   <tr>
    <td>
     <input type="checkbox" name="privilege_destory" class="destory"/>
     <span>软删除</span>
    </td>
    <td class="center">可对博客内文章进行软删除操作</td>
    <td class="center"><img class="d_delete" name="privilege_destory"  src="_IMG_/icon_trash.gif"/></td>
   </tr>
   <tr>
    <td>
     <input type="checkbox" name="privilege_max" class="max"/>
     <span>最高</span>
    </td>
    <td class="center">最高权限，可对其他管理员权限进行操作</td>
    <td class="center"><img class="m_delete" name="privilege_max" src="_IMG_/icon_trash.gif"/></td>
   </tr>

  </table>
  
  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
	   <input type="checkbox" id="del"/>
	   <label for="del" class="btnStyle middle">全选</label>
	   <input type="button" value="批量添加权限" class="btnStyle" id="submit"/>
	  </div>
	  <!-- turn page -->

  </div>
  </form>
 </div>
</body>
</html>