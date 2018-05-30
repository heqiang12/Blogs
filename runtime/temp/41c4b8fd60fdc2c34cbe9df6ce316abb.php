<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"E:\wamp\www\Blogs\public/../application/index\view\index\index.html";i:1519430664;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <link rel="stylesheet" href="_CSS_/blog.css">
    <!--<link rel="stylesheet" href="_CSS_/parse.css" >-->
    <script src="_JS_/jquery-1.11.3.min.js"></script>
    <script src="_JS_/blogs.js"></script>
</head>
<body>
<!--整体-->
<div class="con">
    <!--头部-->
    <div class="header">
        <p>个人博客</p>
        <span>个人博客，记录知识，分享生活！</span>
    </div>
    <!--主体-->
    <div class="main">
        <!--main中的头-->
        <div class="main_header">
            <ul id="main_header_ul">
                <li style="width: 209px"><a href="_BLOGS_/index" style="width: 209px">首页</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_qian">前端</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_php">php</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_mysql">mysql</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_linux">linux</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_blog">博客制作</a></li>
                <li><a href="_BLOGS_/index/fenlei?biao=article_zatan">杂谈</a></li>
            </ul>
        </div>
        <!--左-->
        <div class="main_left">
            <!-- 最新发布 -->
            <p class="main_left_zx">最新发布:</p>
            <?php if(is_array($Info) || $Info instanceof \think\Collection || $Info instanceof \think\Paginator): $i = 0; $__LIST__ = $Info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <article class="main_left_article">
                <h3 class="main_left_h"><a href="_BLOGS_/index/show?biao=<?php echo $vo['leia']; ?>&&id=<?php echo $vo['id']; ?>" target="_blank"><?php echo $vo['arti_title']; ?></a></h3>
                <p>
                    <i><?php echo $vo['ad_time']; ?></i>
                    <i>阅读：<?php echo $vo['clicksum']; ?></i>
                    <i><?php echo $vo['lei']; ?></i>
                </p>
                <div class="main_left_p"><?php echo $vo['arti_contents']; ?></div>
            </article>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <!--右-->
        <div class="main_right">
            <!-- 博主信息 -->
            <div class="main_right_bozhu">
                <p class="main_right_bxinxi">博主信息</p>
                <p class="main_right_x">姓名：贺强</p>
                <p class="main_right_xx">职业：正在找工作</p>
                <p class="main_right_xx">邮箱：15261813546@163.com</p>
                <p class="main_right_xx">坐标：南京</p>
            </div>
            <!-- 热门文章 -->
            <div class="main_right_re">
                <p class="main_right_tui">热门推荐</p>
                <ul class="main_right_ul">
                    <li><i class="main_right_span1">01.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $click['0']['leia']; ?>&&id=<?php echo $click['0']['id']; ?>" target="_blank"><?php echo $click['0']['arti_title']; ?>这是测试这是测试这是测试</a>
                        <span class="main_right_ul_span">(<?php echo $click['0']['clicksum']; ?>)</span></li>
                    <li><i class="main_right_span1">02.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $click['1']['leia']; ?>&&id=<?php echo $click['1']['id']; ?>" target="_blank"><?php echo $click['1']['arti_title']; ?></a>
                        <span class="main_right_ul_span">(<?php echo $click['1']['clicksum']; ?>)</span></li>
                    <li><i class="main_right_span1">03.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $click['2']['leia']; ?>&&id=<?php echo $click['2']['id']; ?>" target="_blank"><?php echo $click['2']['arti_title']; ?></a>
                        <span class="main_right_ul_span">(<?php echo $click['2']['clicksum']; ?>)</span></li>
                    <li><i class="main_right_span1">04.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $click['3']['leia']; ?>&&id=<?php echo $click['3']['id']; ?>" target="_blank"><?php echo $click['3']['arti_title']; ?></a>
                        <span class="main_right_ul_span">(<?php echo $click['3']['clicksum']; ?>)</span></li>
                    <li style="width: 249px"><i class="main_right_span1">05.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $click['4']['leia']; ?>&&id=<?php echo $click['4']['id']; ?>" target="_blank"><?php echo $click['4']['arti_title']; ?></a>
                        <span class="main_right_ul_span">(<?php echo $click['4']['clicksum']; ?>)</span></li>
                </ul>
            </div>
            <!-- 博主推荐 -->
            <div class="main_right_botui">
                <p class="main_right_tui">博主推荐</p>
                <ul class="main_right_ul">
                    <li><i class="main_right_span1">01.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $tuij['0']['biao']; ?>&&id=<?php echo $tuij['0']['fid']; ?>" target="_blank"><?php echo $tui0['arti_title']; ?></a>
                        <span class="main_right_ul_span"><?php echo $tui0['clicksum']; ?></span></li>
                    <li><i class="main_right_span1">02.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $tuij['1']['biao']; ?>&&id=<?php echo $tuij['1']['fid']; ?>" target="_blank"><?php echo $tui1['arti_title']; ?></a>
                        <span class="main_right_ul_span"><?php echo $tui1['clicksum']; ?></span></li>
                    <li><i class="main_right_span1">03.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $tuij['2']['biao']; ?>&&id=<?php echo $tuij['2']['fid']; ?>" target="_blank"><?php echo $tui2['arti_title']; ?></a>
                        <span class="main_right_ul_span"><?php echo $tui2['clicksum']; ?></span></li>
                    <li><i class="main_right_span1">04.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $tuij['3']['biao']; ?>&&id=<?php echo $tuij['3']['fid']; ?>" target="_blank"><?php echo $tui3['arti_title']; ?></a>
                        <span class="main_right_ul_span"><?php echo $tui3['clicksum']; ?></span></li>
                    <li style="width: 249px"><i class="main_right_span1">05.</i>
                        <a href="_BLOGS_/index/show?biao=<?php echo $tuij['4']['biao']; ?>&&id=<?php echo $tuij['4']['fid']; ?>" target="_blank"><?php echo $tui4['arti_title']; ?></a>
                        <span class="main_right_ul_span"><?php echo $tui4['clicksum']; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <!--尾部-->
    <div class="bootom">
        <p>Copyright&copy2018 贺强</p>
    </div>
</div>
</body>
</html>