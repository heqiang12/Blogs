<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp\www\Blogs\public/../application/admin\view\admin\article_list.html";i:1517966737;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>产品列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
<script src="_JS_/jquery.js"></script>
<script src="_JS_/public.js"></script>
 <style>
    #spancon{overflow: hidden;
        text-overflow:ellipsis;width: 300px;display: inline-block;
        white-space: nowrap;}
    .pagination{float:left}
 </style>
    <script>
        $(function () {

            $("#del").hide();
            $(".deld").hide();
            $(".delp").hide();
            $(".void").hide();
            $("#wancheng").hide();
        $("#guanli").click(function () {
            $("#guanli").hide();
            $("#wancheng").show();
            $(".void").show();
            $("#del").show();
            $(".deld").show();
            $(".delp").show();
        });
            $("#wancheng").click(function () {
                $("#guanli").show();
                $("#wancheng").hide();
                $(".void").hide();
                $("#del").hide();
                $(".deld").hide();
                $(".delp").hide();
            });
            $(".deld").click(function () {
                $("#del").is(":checked")?$("#del").prop("checked",false):$("#del").prop("checked",true);
                if($("#del").is(":checked")){
//                    alert(true);
                    $(".void").prop("checked",true);
                }else{
//                    alert(false);
                    $(".void").prop("checked",false);
                }

            });

        })
        //        ajax分页
        function ajax_page(page) {
            $.ajax({
                url:"<?php echo url('Admin/ajax_rel'); ?>",
                type:"POST",
                data:{page:page,biao:"<?php echo $biao; ?>"},
                success: function(data,status){
                    var add_html = '<tr><th>编号</th><th>标题</th><th>内容</th><th>添加时间</th><th>操作</th></tr>';
                    var list = data.list.data;
                    var html_page = data.page;
                    for (var i=0;i<list.length;i++){
                        add_html = add_html+"<tr id='"+list[i]["id"]+"'><td class='center' id='arti_id'><input type='checkbox' name='ids[]' value='"+list[i]["id"]+"' class='void' />"+list[i]["id"]+"</td><td class='center'>"+list[i]["arti_title"]+"</td><td class='center arti_con'><span id='spancon'>"+list[i]["arti_contents"]+"</span></td><td class='center'>"+list[i]["ad_time"]+"</td><td class='center'><a href='../Admin/article_cha?id="+list[i]["id"]+"&biao=<?php echo $biao; ?>' class='arti_cha'><img src='_IMG_/icon_view.gif'></a><a href='../Admin/edi_larticle?id="+list[i]["id"]+"&biao=<?php echo $biao; ?>' class='arti_edi'><img src='_IMG_/icon_edit.gif'><a href='javascript:void(0)' class='arti_del' onclick='arti_del("+list[i]["id"]+")'><img src='_IMG_/icon_drop.gif'></a></td></tr>";
                    }
                    $("#tablerel").html(add_html);
                    $("#fenye").html(html_page);
                    if($("#wancheng").css("display")=="block"){
//                        alert(true);
                        $(".void").show();
                    }else{
//                        alert(false);
                         $(".void").hide();
                    }
                    $('.Interlaced tr:odd').addClass('trbgcolor');
                }
            });
        }
        function arti_del(id) {
//                alert(id);
            var r = confirm("确定删除此篇文章？");
            if(r==true){

                var data={"biao":"<?php echo $biao; ?>","id":id};
                $.ajax({
                        type:"post",
                        url:"<?php echo url('Admin/des_article'); ?>",
                        dataType:"json",
                        data:data,
                        success:function (data) {
                            if(data["success"]=="success"){
                                var da=data["id"];
                                alert("软删除成功！");
                                $("#"+da).hide("slow");
                            }else{
                                alert("软删除失败！");
                            }
                        }
                    }
                )
            }
        };
            function delep() {
                var formdata=$("#myform").serialize();
//                console.log(formdata);
                $.ajax({
                    type:"post",
                    url:"<?php echo url('Admin/delp_article'); ?>",
                    datatype:"json",
                    data:formdata,
                    success:function (data) {
                        if(data["success"]=="success"){
                            alert("批量删除成功！");
                            data["ids"].forEach(function (i) { $("#"+i).hide("slow") });
                        }else{
                            alert("批量删除失败！");
                        }
                    }
                })
            };
        function tuijian(biao,id) {
            $.ajax({
                type:"post",
                url:"<?php echo url('Admin/tuijian'); ?>",
                datatype:"json",
                data:{"biao":biao,"fid":id},
                success:function (data) {
                    if(data="success"){
                        alert("已收入推荐名单");
                    }else{
                        alert("推荐失败！");
                    }

                }
            });
        }
    </script>
</head>
<body>
 <div class="wrap">
  <div class="page-title BatchOperation ">
    <span class="modular fl"><i></i><em>文章列表</em></span>
      <button style="float: right" class="btnStyle" id="guanli">管理</button>
      <button style="float: right" class="btnStyle" id="wancheng">完成</button>
      <!--<input type="button" value="管理" class="btnStyle">-->
  </div>
     <form action="" method="post" id="myform">
         <input type="hidden" name="biao" value="<?php echo $biao; ?>">
  <table class="list-style Interlaced" id="tablerel">
   <tr>
    <th>编号</th>
    <th>标题</th>
    <th>内容</th>
    <th>添加时间</th>
    <th>操作</th>
       <th>推荐</th>
   </tr>

   <?php if(is_array($Info) || $Info instanceof \think\Collection || $Info instanceof \think\Paginator): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
   <tr  class="fen" id="<?php echo $vo['id']; ?>">
    <td class="center" id="arti_id"  ><input type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"  class="void" /><?php echo $vo['id']; ?></td>
    <td class="center"><?php echo $vo['arti_title']; ?></td>
    <td class="center"  class="arti_con"><span id="spancon" ><?php echo $vo['arti_contents']; ?></span></td>
    <td class="center"  ><?php echo $vo['ad_time']; ?></td>
    <td class="center">
     <a href="../Admin/article_cha?id=<?php echo $vo['id']; ?>&biao=<?php echo $biao; ?>" title="查看"  class="arti_cha"><img src="_IMG_/icon_view.gif"/></a>
     <a href="../Admin/edi_larticle?id=<?php echo $vo['id']; ?>&biao=<?php echo $biao; ?>" title="编辑" class="arti_edi"><img src="_IMG_/icon_edit.gif"/></a>
     <a title="删除" href="javascript:void(0)" value="<?php echo $vo['id']; ?>" class="arti_del" onclick="arti_del('<?php echo $vo['id']; ?>')"><img src="_IMG_/icon_drop.gif"/></a>
    </td>
       <td class="tuijian center" onclick="tuijian('<?php echo $biao; ?>','<?php echo $vo['id']; ?>')">推荐</td>
   </tr>
   <?php endforeach; endif; else: echo "" ;endif; ?>
  </table>

  <!-- BatchOperation -->
  <div style="overflow:hidden;">
      <!-- Operation -->
	  <div class="BatchOperation fl">
           <input type="checkbox" id="del"/>
           <input type="button" for="del" class="btnStyle middle deld" value="全选"></input>
           <input type="button" value="批量删除" class="btnStyle delp" onclick="delep()"/>
	  </div>
	  <!-- turn page -->
	  <div class="turnPage center fr" id="fenye">
	   <?php echo $Info->render(); ?>
      </div>
  </div>
     </form>
 </div>
</body>
</html>