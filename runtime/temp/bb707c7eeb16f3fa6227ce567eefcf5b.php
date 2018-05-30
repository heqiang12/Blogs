<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp\www\Blogs\public/../application/admin\view\admin\edi_larticle.html";i:1513740369;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>修改文章</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="_CSS_/adminStyle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="_CSS_/editormd.css" >

    <script src="_JS_/jquery.js"></script>
    <script src="_JS_/editormd.js"></script>
    <script src="_JS_/public.js"></script>
    <!--调用markdown文本编辑器-->
    <script type="text/javascript">
        //    调用编辑器
        var testEditor;
        $(function() {
            testEditor = editormd("test-editormd", {
                width   : "1000px",
                height  : 640,
                syncScrolling : "single",
                path    : "/Blogs/public/static/editor.md-master/lib/"
            });
        });
    </script>
    <!--提交表单，ajax-->
    <script type="text/javascript">
        $(function () {
            $("#submit").click(function () {
                var formdata=$("#myform").serialize();
                var r=confirm("确认提交？");
                if(r==true){
                    $.post("edi_article",formdata,
                        function (data) {
                            if(data=="success"){
                                alert("成功！");
                            }else{
                                alert("失败！");
                            }

                        }
                    );
                }
            });
            var qian=$(".qian").val();
            var php=$(".php").val();
            var mysql=$(".mysql").val();
            var linux=$(".linux").val();
            var blog=$(".blog").val();
            var za=$(".za").val();
        switch ("<?php echo $biao; ?>") {
            case qian:
                $(".qian").prop("selected",true)
                break;
            case php:
                $(".php").prop("selected",true)
                break;
            case mysql:
                $(".mysql").prop("selected",true)
                break;
            case linux:
                $(".linux").prop("selected",true)
                break;
            case blog:
                $(".blog").prop("selected",true)
                break;
            case za:
                $(".za").prop("selected",true)
                break;
            default:
                $(".qian").prop("selected",true)
        }
        })

    </script>
</head>
<body>
<div class="wrap">
    <div class="page-title">
        <span class="modular fl"><i></i><em>修改文章</em></span>
    </div>
    <form action="" method="post" id="myform">
        <table class="list-style Interlaced">
            <input type="hidden" name="id" value="<?php echo $Info['id']; ?>">
            <tr>
                <td>文章类别：
                    <select name="biao" id="" style="width: 100px;height: 30px">
                        <option value="article_qian" class="qian">前端</option>
                        <option value="article_php" class="php">php</option>
                        <option value="article_mysql" class="mysql">mysql</option>
                        <option value="article_linux" class="linux">linux</option>
                        <option value="article_blog" class="blog">博客制作</option>
                        <option value="article_zatan" class="za">杂谈</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>文章标题 : <input type="text" name="arti_title" style="width: 200px;height:25px" value="<?php echo $Info['arti_title']; ?>"> </td>
            </tr>
            <tr>
                <td>文章内容 ：<div id="test-editormd">
                    <textarea style="display:none;" name="arti_contents" id="ts"><?php echo $Info['arti_contents']; ?></textarea>
                </div></td>
            </tr>

        </table>
        <!-- BatchOperation -->
        <div style="overflow:hidden;">
            <!-- Operation -->
            <div class="BatchOperation fl">

                <input type="button" value="提交文章" id="submit" class="btnStyle"/>
            </div>
            <!-- turn page -->

        </div>
    </form>
</div>
</body>
</html>