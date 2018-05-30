<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wamp\www\Blogs\public/../application/admin\view\admin\hui_article.html";i:1514001969;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>回收站列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
    <script src="_JS_/jquery.js"></script>
    <script src="_JS_/public.js"></script>
    <style>

    </style>
    <script>
        $(function () {
            $(".hui").click(function () {
                var r=confirm("确定恢复此文章？");
                if(r){
                    var data={"biao":"<?php echo $biaoname; ?>","id":$(this).attr("value")};
                    $.ajax({
                        type:"post",
                        url:"<?php echo url('Admin/huifu_arti'); ?>",
                        datatype:"json",
                        data:data,
                        success:function (data) {
                            if(data["success"]=="success"){
                                alert("恢复成功！");
                                $("#"+data["id"]).hide("slow");
                            }else{
                                alert("恢复失败！");
                            }
                        }
                    })
                }

            });


        $("select").change(function () {
            var biao=$("select").val();
            location.href="../Admin/hui_article?biao="+biao;
        });
        var qian=$("#qian").val();
        var php=$("#php").val();
        var mysql=$("#mysql").val();
        var linux=$("#linux").val();
        var blog=$("#blog").val();
        var za=$("#za").val();
        switch ("<?php echo $biaoname; ?>"){
            case qian:
                $("#qian").prop("selected",true)
                break;
            case php:
                $("#php").prop("selected",true)
                break;
            case mysql:
                $("#mysql").prop("selected",true)
                break;
            case linux:
                $("#linux").prop("selected",true)
                break;
            case blog:
                $("#blog").prop("selected",true)
                break;
            case za:
                $("#za").prop("selected",true)
                break;
            default:
                $("#qian").prop("selected",true)
        }

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
                url:"<?php echo url('Admin/ajax_rell'); ?>",
                type:"POST",
                data:{page:page,biao:"<?php echo $biaoname; ?>"},
                success: function(data,status){
                    var add_html = '<tr><th>编号</th><th>标题</th><th>内容</th><th>添加时间</th><th>删除时间</th><th>操作</th></tr>';
                    var list = data.list.data;
                    var html_page = data.page;
                    for (var i=0;i<list.length;i++){
                        add_html = add_html+"<tr id='"+list[i]["id"]+"'><td class='center' id='arti_id'><input type='checkbox' name='ids[]' value='"+list[i]["id"]+"' class='void' />"+list[i]["id"]+"</td><td class='center'>"+list[i]["arti_title"]+"</td><td class='center arti_con'><span id='spancon'>"+list[i]["arti_contents"]+"</span></td><td class='center'>"+list[i]["ad_time"]+"</td><td class='center'>"+list[i]["de_time"]+"</td><td class='center huifu' value='"+list[i]["id"]+"' onclick='huifu("+list[i]["id"]+")'><a>恢复</a></td></tr>";
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
        function huifu(id) {
            var r=confirm("确定恢复此文章？");
            if(r){
                var data={"biao":"<?php echo $biaoname; ?>","id":id};
                $.ajax({
                    type:"post",
                    url:"<?php echo url('Admin/huifu_arti'); ?>",
                    datatype:"json",
                    data:data,
                    success:function (data) {
                        if(data["success"]=="success"){
                            alert("恢复成功！");
                            $("#"+data["id"]).hide("slow");
                        }else{
                            alert("恢复失败！");
                        }
                    }
                })
            }

        };
        function delep() {
            var formdata=$("#myform").serialize();
//                console.log(formdata);
            $.ajax({
                type:"post",
                url:"<?php echo url('Admin/huifup_arti'); ?>",
                datatype:"json",
                data:formdata,
                success:function (data) {
                    if(data["success"]=="success"){
                        alert("批量恢复成功！");
                        data["ids"].forEach(function (i) { $("#"+i).hide("slow") });
                    }else{
                        alert("批量恢复失败！");
                    }
                }
            })
        };
    </script>
</head>
<body>
<div class="wrap">
    <div class="page-title BatchOperation">
        <span class="modular fl "><i></i><em>回收站列表</em></span>
        <button style="float: right" class="btnStyle" id="guanli">管理</button>
        <button style="float: right" class="btnStyle" id="wancheng">完成</button>
    </div>
    <select name="" id="" style="width: 80px;height: 30px">
        <option value="article_qian" id="qian">前端</option>
        <option value="article_php" id="php">php</option>
        <option value="article_mysql" id="mysql">mysql</option>
        <option value="article_linux" id="linux">linux</option>
        <option value="article_blog" id="blog">博客制作</option>
        <option value="article_zatan" id="za">杂谈</option>
    </select>
    <form action="" method="post" id="myform">
        <input type="hidden" name="biao" value="<?php echo $biaoname; ?>">
    <table class="list-style Interlaced" id="tablerel">
        <tr>
            <th>编号</th>
            <th>标题</th>
            <th>内容</th>
            <th>添加时间</th>
            <th>删除时间</th>
            <th>操作</th>
        </tr>

        <?php if(is_array($Info) || $Info instanceof \think\Collection || $Info instanceof \think\Paginator): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr id="<?php echo $vo['id']; ?>">
            <td class="center" id="arti_id" value="<?php echo $vo['id']; ?>"><input type="checkbox" name="ids[]" value="<?php echo $vo['id']; ?>"  class="void" /><?php echo $vo['id']; ?></td>
            <td class="center"><?php echo $vo['arti_title']; ?></td>
            <td class="center"  class="arti_con"><?php echo $vo['arti_contents']; ?></td>
            <td class="center"  ><?php echo $vo['ad_time']; ?></td>
            <td class="center"  ><?php echo $vo['de_time']; ?></td>
            <td class="center hui" value="<?php echo $vo['id']; ?>" onclick="huifu('<?php echo $vo['id']; ?>')">
                <a >恢复</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <!-- BatchOperation -->
    <div style="overflow:hidden;">
        <!-- Operation -->
        <div class="BatchOperation fl">
            <input type="checkbox" id="del"/>
            <input type="button" for="del" class="btnStyle middle deld" value="全选"></input>
            <input type="button" value="批量恢复" class="btnStyle delp" onclick="delep()"/>
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