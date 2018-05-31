<?php
namespace app\index\controller;
use think\Controller;
use think\View;
use think\Db;
use think\Parsedown;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        $z=Db::query("select id ,arti_title,ad_time,arti_contents,clicksum,lei from article_php
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum,lei from article_qian
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum,lei from article_linux
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum,lei from article_mysql
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum,lei from article_blog
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum,lei from article_zatan
                          ORDER BY ad_time DESC limit 5
                   ");
        $a=Db::query("select id,arti_title,clicksum,lei from article_php
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_qian
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_linux
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_mysql
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_blog
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_zatan
                          ORDER BY clicksum DESC limit 5
                    ");
        $parsedown = new Parsedown();
        for($i=0;$i<count($z);$i++){
            $z[$i]["arti_contents"]=$parsedown->text($z[$i]["arti_contents"]);
        }
        for($i=0;$i<count($z);$i++){
            switch ($z[$i]["lei"]){
                case "博客制作":
                    $z[$i]["leia"]="article_blog";
                    break;
                case "linux":
                    $z[$i]["leia"]="article_linux";
                    break;
                case "mysql":
                    $z[$i]["leia"]="article_mysql";
                    break;
                case "php":
                    $z[$i]["leia"]="article_php";
                    break;
                case "前端":
                    $z[$i]["leia"]="article_qian";
                    break;
                case "杂谈":
                    $z[$i]["leia"]="article_zatan";
                    break;
            }
        }
        for($i=0;$i<count($a);$i++){
            switch ($a[$i]["lei"]){
                case "博客制作":
                    $a[$i]["leia"]="article_blog";
                    break;
                case "linux":
                    $a[$i]["leia"]="article_linux";
                    break;
                case "mysql":
                    $a[$i]["leia"]="article_mysql";
                    break;
                case "php":
                    $a[$i]["leia"]="article_php";
                    break;
                case "前端":
                    $a[$i]["leia"]="article_qian";
                    break;
                case "杂谈":
                    $a[$i]["leia"]="article_zatan";
                    break;
            }
        }
        dump($a);
        $tui=Db::table("tuijian")->limit(5)->select();

        for($i=0;$i<count($tui);$i++){
            $tuijian=Db::table($tui[$i]["biao"])->where("id",$tui[$i]["fid"])->find();
//                    dump($tuijian);
            $this->assign("tui$i",$tuijian);
        }
        $this->assign("tuij",$tui);
        $this->assign("Info",$z);
        $this->assign("click",$a);
        return view();
    }



//    public function fenlei($biao){
//        $z=Db::query("select * from $biao ORDER BY ad_time DESC limit 5 ");
//        $a=Db::query("select id,arti_title,clicksum from article_php
//                          UNION ALL
//                          select id,arti_title,clicksum from article_qian
//                          UNION ALL
//                          select id,arti_title,clicksum from article_linux
//                          UNION ALL
//                          select id,arti_title,clicksum from article_mysql
//                          UNION ALL
//                          select id,arti_title,clicksum from article_blog
//                          UNION ALL
//                          select id,arti_title,clicksum from article_zatan
//                          ORDER BY clicksum DESC limit 5
//                    ");
//        $parsedown = new Parsedown();
//        for($i=0;$i<count($z);$i++){
//            $z[$i]["arti_contents"]=$parsedown->text($z[$i]["arti_contents"]);
//        }
//        $this->assign("Info",$z);
//        $this->assign("click",$a);
//        return view();
//    }
    //    ajax分页
    public function fenlei($biao){

        $data=Db::table($biao)->paginate(5,false,['type'=>'Ajaxpage']);
        $a=Db::query("select id,arti_title,clicksum,lei from article_php
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_qian
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_linux
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_mysql
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_blog
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_zatan
                          ORDER BY clicksum DESC limit 5
                    ");
//        $parsedown = new Parsedown();
//        for($i=0;$i<count($data);$i++){
//            $data[$i]["arti_contents"]=$parsedown->text($data[$i]["arti_contents"]);
//        }
        for($i=0;$i<count($a);$i++){
            switch ($a[$i]["lei"]){
                case "博客制作":
                    $a[$i]["leia"]="article_blog";
                    break;
                case "linux":
                    $a[$i]["leia"]="article_linux";
                    break;
                case "mysql":
                    $z[$i]["leia"]="article_mysql";
                    break;
                case "php":
                    $a[$i]["leia"]="article_php";
                    break;
                case "前端":
                    $a[$i]["leia"]="article_qian";
                    break;
                case "杂谈":
                    $a[$i]["leia"]="article_zatan";
                    break;
            }
        }
        $tui=Db::table("tuijian")->limit(5)->select();

        for($i=0;$i<count($tui);$i++){
            $tuijian=Db::table($tui[$i]["biao"])->where("id",$tui[$i]["fid"])->find();
//                    dump($tuijian);
            $this->assign("tui$i",$tuijian);
        }
        $this->assign("tuij",$tui);
        $this->assign("biao",$biao);
        $this->assign("Info",$data);
        $this->assign("click",$a);
        return view();


    }
    public function ajax_rel(){
        $data=Request::instance()->post();
        $page = $data["page"];
        $biao=$data["biao"];
        if (!empty($page)) {
            $rel = Db::table($biao)->paginate(5,false,['type'=>'Ajaxpage']);
            $page = $rel->render();
        }
        return ['list'=>$rel,'page'=>$page,'biao'=>$biao];
    }

    public function show($id,$biao){

        $data=Db::table($biao)->where("id",$id)->find();
        $b=Db::table($biao)->where("id",$id)->update([
            "clicksum"=>$data["clicksum"]+1
        ]);
        $a=Db::query("select id,arti_title,clicksum,lei from article_php
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_qian
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_linux
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_mysql
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_blog
                          UNION ALL
                          select id,arti_title,clicksum,lei from article_zatan
                          ORDER BY clicksum DESC limit 5
                    ");
        for($i=0;$i<count($a);$i++){
            switch ($a[$i]["lei"]){
                case "博客制作":
                    $a[$i]["leia"]="article_blog";
                    break;
                case "linux":
                    $a[$i]["leia"]="article_linux";
                    break;
                case "mysql":
                    $z[$i]["leia"]="article_mysql";
                    break;
                case "php":
                    $a[$i]["leia"]="article_php";
                    break;
                case "前端":
                    $a[$i]["leia"]="article_qian";
                    break;
                case "杂谈":
                    $a[$i]["leia"]="article_zatan";
                    break;
            }
        }
        $tui=Db::table("tuijian")->limit(5)->select();

        for($i=0;$i<count($tui);$i++){
            $tuijian=Db::table($tui[$i]["biao"])->where("id",$tui[$i]["fid"])->find();
//                    dump($tuijian);
            $this->assign("tui$i",$tuijian);
        }
        $this->assign("tuij",$tui);
        $Parsedown=new Parsedown();
        $da=$Parsedown->text($data["arti_contents"]);
        $this->assign("info",$data);
        $this->assign("text",$da);
        $this->assign("click",$a);
        return view();
    }

//    main_list
    public function main_list(){
        $z=Db::query("select id ,arti_title,ad_time,arti_contents,clicksum from article_php
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum from article_qian
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum from article_linux
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum from article_mysql
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum from article_blog
                          UNION ALL 
                          select id ,arti_title,ad_time,arti_contents ,clicksum from article_zatan
                          ORDER BY ad_time DESC limit 5
                   ");
        $a=Db::query("select id,arti_title,clicksum from article_php
                          UNION ALL
                          select id,arti_title,clicksum from article_qian
                          UNION ALL
                          select id,arti_title,clicksum from article_linux
                          UNION ALL
                          select id,arti_title,clicksum from article_mysql
                          UNION ALL
                          select id,arti_title,clicksum from article_blog
                          UNION ALL
                          select id,arti_title,clicksum from article_zatan
                          ORDER BY clicksum DESC limit 5
                    ");
        $parsedown = new Parsedown();
        for($i=0;$i<count($z);$i++){
            $z[$i]["arti_contents"]=$parsedown->text($z[$i]["arti_contents"]);
        }
        $this->assign("Info",$z);
        $this->assign("click",$a);
        return view();
    }
}
