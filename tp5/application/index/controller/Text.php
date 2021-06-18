<?php

namespace app\index\controller;

use think\Controller;
use think\facade\Request;
use think\Db;
use think\Session;
use app\index\model\User as UserModel;
class Text extends Controller
{
    public function text1()
    {
        $u =UserModel::where('user_id',79)->find();
        echo "名字".$u->user_name;echo "<br>";
        echo "加入时间".date('Y-m-d H:i:s',$u->reg_time);
        // 页面渲染
        return view();
    }
    public function text2()
    {
        echo "<pre>";print_r(Request::param());echo"</pre>";
        $new = new UserModel;
        $new->user_name ='蔡景贵';
        $new->email = '蔡景贵@qq.com';
        $new->save();
    }
}
