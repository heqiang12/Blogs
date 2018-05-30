<?php
namespace app\admin\controller;
use \think\Controller;
use think\Db;
use think\Session;
use think\Request;

class Index extends Controller
{
    public function index()
    {
        if(Session::has()){
            return view();
        }

    }

    public function menu()
    {
        
        return view();
    }
     public function top()
    {
        $name=Session::get("name");
        $this->assign("name",$name);
        return view();
    }
     public function bar()
    {
        
        return view();
    }
     public function main()
    {
        return view();
    }
    public function login(){
        if(Request::instance()->post()){
            $name=$_POST["name"];
            $pwd=$_POST["pwd"];
            $z=Db::table("admin")->where("admin_name",$name)->where("admin_pwd",$pwd)->select();
            if($z){
                Session::set("name",$name);
                Session::set("pwd",$pwd);
                return view("Index/index");
            }else{
                return view();
            }
        }else{
            return view();
        }

    }

}
