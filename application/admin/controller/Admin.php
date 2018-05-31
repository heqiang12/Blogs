<?php
namespace app\Admin\controller;
use think\View;
use think\Request;
use think\Db;
use think\Parsedown;
use think\paginator\driver\Ajaxbootstrap;
//use think\parsedown\Parsedown;
class Admin extends \think\Controller
{
    public function add_user()
    {
        if(Request::instance()->post()){
        	$data=Request::instance()->post();
        	$da=Db::table("admin")->insert($data);
    	if($da){
    		return ("success");
    	}else{
    		return ("error");
    	}
        }
        return view();
    }
    public function privilege(){
        if(Request::instance()->post()){
            $data=Request::instance()->post();
            $a=$data["id"];
            $amend=$data["amend"]=="0"?"0":Null;
            $destory=$data["destory"]=="0"?"0":Null;
            $max=$data["max"]=="0"?"0":Null;
            $da=Db::table("admin")->update([
                "privilege_amend"=>$amend,
                "privilege_destory"=>$destory,
                "privilege_max"=>$max,
                "id"=>$a]);
            if($da){
                return ("success");
            }else{
                return ("error");
            }
        }
        $z=Db::table("admin")->select();
        $this->assign("info",$z);
        return view();
    }
    public function privilege_cha(){
        if(Request::instance()->post()){
            $data=Request::instance()->post();
        $z=Db::table("admin")->where("id",$data["data"])->find();
            if($z){
                return ($z);
            }else{
                return("error");
            }
        }else{
            return("wu");
        }
    }
    public function privilege_delete(){
        if(Request::instance()->post()){
            $data=Request::instance()->post();
            $amend=$data["data2"];
            $a=Db::table("admin")->update([$amend=>Null,"id"=>$data["data"]]);
            if($a){
                return("success");
            }else{
                return("error");
            }
        }else{
            return("wu");
        }
    }
    public function add_article(){
        if(Request::instance()->post()){
            $data=Request::instance()->post();
            $biao=$data["biao"];
            switch ($biao){
                case "article_blog":
                    $lei="博客制作";
                    break;
                case "article_linux":
                    $lei="linux";
                    break;
                case "article_mysql":
                    $lei="mysql";
                    break;
                case "article_php":
                    $lei="php";
                    break;
                case "article_qian":
                    $lei="前端";
                    break;
                case "article_zatan":
                    $lei="杂谈";
                    break;
            }
            $date=date("Y-m-d H:i");
            $da=["arti_title"=>$data["arti_title"],"arti_contents"=>$data["arti_contents"],"ad_time"=>$date,"lei"=>$lei];
            $z=Db::table($biao)->insert($da);
            if($z){
                return("success");
            }else{
                return("error");
            }
        }else{
            return view();
        }

    }
//    public function admin_zhan(){
//        $data=Db::table("article")->where("id",5)->find();
//        $Parsedown=new Parsedown();
//        $text = $Parsedown->text($data["arti_contents"]);
//        $this->assign("Info",$text);
//        return view();
//
//    }
    public function article_list($biao){

            $data=Db::table($biao)->where("de_time","Null")->paginate(3,false,['type'=>'Ajaxpage']);
//        dump(substr($data[2]["arti_contents"],0,80));
//        $data[2]["id"]="qweqw";
//        dump($data[2]);
//        dump(count($data->items()));

//        for($i=0;$i<count($data->items());$i++){
//            $data[$i]["arti_contents"] = substr($data[$i]["arti_contents"],0,80);
//            dump($data->items()[$i]["arti_contents"]);
//        }
//        dump($data->items());
            $this->assign("biao",$biao);
            $this->assign("Info",$data);
            return view("article_list");
    }
//    ajax分页
    public function ajax_rel(){
        $data=Request::instance()->post();
        $page = $data["page"];
        $biao=$data["biao"];
        if (!empty($page)) {
            $rel = Db::table($biao)->where("de_time","Null")->paginate(3,false,['type'=>'Ajaxpage']);
            $page = $rel->render();
        }
        return ['list'=>$rel,'page'=>$page];
    }

    public function article_cha($id,$biao){
        $data=Db::table($biao)->where("id",$id)->find();
        $Parsedown=new Parsedown();
        $da=$Parsedown->text($data["arti_contents"]);
        $this->assign("Info",$data);
        $this->assign("text",$da);
        return view();
    }
    public function edi_larticle($id,$biao){
        $z=Db::table($biao)->where("id",$id)->find();
        $this->assign("Info",$z);
        $this->assign("biao",$biao);
        return view();
    }
    public function edi_article(){
        $data=Request::instance()->post();
        $z=Db::table($data["biao"])->update([
            "arti_title"=>$data["arti_title"],
            "arti_contents"=>$data["arti_contents"],
            "id"=>$data["id"]]);
        if($z){
            return("success");
        }else{
            return("error");
        }
    }
    public function des_article(){
        $date=date("Y-m-d H:i");
        $data=Request::instance()->post();
        $z=Db::table($data["biao"])->update([
            "id"=>$data["id"],
            "de_time"=>$date
        ]);
        $da=["success"=>"success","id"=>$data["id"]];
        if($z){
            return ($da);
        }else{
            return("error");
        }
    }
    public function hui_article($biao){
            $z=Db::table($biao)->where("de_time","not null")->paginate(3,false,['type'=>'Ajaxpage']);
//        for($i=0;$i<count($z);$i++){
//            $z[$i]["arti_contents"] = substr($z[$i]["arti_contents"],0,80);
//        }
            $this->assign("Info",$z);
            $this->assign("biaoname",$biao);
            return view();
    }
    //    ajax分页
    public function ajax_rell(){
        $data=Request::instance()->post();
        $page = $data["page"];
        $biao=$data["biao"];
        if (!empty($page)) {
            $rel = Db::table($biao)->where("de_time","not Null")->paginate(3,false,['type'=>'Ajaxpage']);
            $page = $rel->render();
        }
        return ['list'=>$rel,'page'=>$page];
    }
    public function huifu_arti(){
        $data=Request::instance()->post();
        $z=Db::table($data["biao"])->update(["id"=>$data["id"],"de_time"=>Null]);
        if($z){
            $da=["success"=>"success","id"=>$data["id"]];
            return ($da);
        }else{
            return("error");
        }
    }
//    批量恢复
    public function huifup_arti(){
        $data=Request::instance()->post();
        $z=Db::table($data["biao"])->where("id","in",$data["ids"])->update(["de_time"=>Null]);
        if($z){
            return["success"=>"success","ids"=>$data["ids"]];
        }else{
            return("error");
        }
//        return["success"=>"success","ids"=>$data["ids"]];
    }
    public function delp_article(){
        $data=Request::instance()->post();
//        for($i=0;$i<$data["ids"];$i++){
//            $da[$i]=$data[$i]["ids"];
//        }
        $date=date("Y-m-d H:i");
        $z=Db::table($data["biao"])->where("id","in",$data["ids"])->update(["de_time"=>$date]);
        if($z){
            return ["success"=>"success","ids"=>$data["ids"]];
        }else{
            return("error");
        }
        return ["success"=>"success","ids"=>$data["ids"]];
    }
    public function file(){
        return view();
    }
    public function ajaxfile(){
        $data=Request::instance()->post();
        if($data){
            return($data["image"]);
        }else{
            return("error");
        }
    }

    public function editxx(){
        //        $id=$_SESSION["id"];
//        $name=$_SESSION["username"];
//        $pwd=$_SESSION["userpwd"];
        if(Request::instance()->post()){
            $id="1";
            $z=Db::table("admin")->where("id",$id)->find();

            $data=Request::instance()->post();
            $jpwd=$data["admin_pwd"];
            $xpwd=$data["admin_xpwd"];

            if(!empty($xpwd)){
//                判断新密码与旧密码是否一致
                if($z["admin_pwd"]==$jpwd){
//                    一致
                    $a=Db::table("admin")->update([
                        "admin_name"=>$data["admin_name"],
                        "admin_email"=>$data["admin_email"],
                        "admin_pwd"=>$xpwd,
                        "admin_phone"=>$data["admin_phone"],
                        "id"=>$id
                    ]);
                    if($a){
                        return("修改成功！");
                    }else{
                        return("修改失败！");
                    }
                }else{
//                    不一致
                    return("新旧密码不一致！");
                }
            }else{
//                新密码为空，密码不做修改
                $a=Db::table("admin")->update([
                    "admin_name"=>$data["admin_name"],
                    "admin_email"=>$data["admin_email"],
                    "admin_phone"=>$data["admin_phone"],
                    "id"=>$id
                ]);
                if($a){
                    return("修改成功！");
                }else{
                    return("修改失败！");
                }
            }
        }else{
            $id="1";
            $data=Db::table("admin")->where("id",$id)->find();
            $this->assign("info",$data);
            return view();
        }

    }
    public function login(){
        $username=$_POST["username"];
        $userpwd=$_POST["userpwd"];
        $z=Db::table("user")->where("username",$username)->where("userpwd",$userpwd)->find();
        if($z){
            return ["data"=>"登录成功！"];
        }else{
            return ["data"=>"登录失败！"];
        }
       
    }
    public function tuijian(){
        $data=Request::instance()->post();
        $z=Db::table("tuijian")->insert($data);
        if($z){
            return ("success");
        }else{
            return ("error");
        }
    }
}
