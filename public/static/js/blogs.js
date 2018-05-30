$(function(){
    $("#main_header_ul > li").addClass("uli");
    $("#main_header_ul > li").mouseover(function(){
        $(this).removeClass("uli").addClass("uli2");
    });
    $("#main_header_ul > li").mouseout(function(){
        $(this).removeClass("uli2").addClass("uli");
    });


    // 最新发布下，框
    $(".main_left_article").mouseover(function(){
        $(this).css({"border-color":"#0080FF","background-color":"#EFFBF5"});
        $(this).next().css({"border-top-color":"#0080FF"});
    });
    $(".main_left_article").mouseout(function(){
        $(this).css({"border-color":"#BDBDBD","background-color":"white"});
        $(this).next().css({"border-top-color":"#BDBDBD"});
    });


    // 热门推荐
    $(".main_right_ul > li").mouseover(function(){
        $(this).addClass("main_right_licss");
    });
    $(".main_right_ul > li").mouseout(function(){
        $(this).removeClass("main_right_licss");
    });

})