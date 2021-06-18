<?php
namespace app\index\controller;
use think\Db;
class Index
{
    public function index()
    {
        //return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
        return 'holle cjg';
    }


    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
    // 登录逻辑
    public function login()
    {
        echo "登录逻辑";
    }
    public function reg()
    {
        echo "注册逻辑";
    }
    public function goodsList()
    {
        $list = Db::table('p_goods')
            ->field('goods_id,goods_name,shop_price')
            ->limit(5)->select();
        echo "<pre>";print_r($list);echo"</pre>";
    }
    public function listL()
    {
        $List = Db::table('p_goods')
            ->where('goods_id',217)
            ->find();
        echo "<pre>";print_r($List);echo"</pre>";
    }
    // 查询年龄大于20的
    public function stu_sex()
    {
        $stu = Db::table('student')
            ->where('age','>',20)
            ->select();
        echo "<pre>";print_r($stu);echo"</pre>";
    }
    // 年龄小于18的学生信息(只显示10条 倒序)
    public function age18()
    {
        $age18 = Db::table('student')
            ->where('age','<',18)
            ->select();
        echo "<pre>";print_r($age18);echo"</pre>";
    }
    // 查询性别为女的学生信息
    public function sex_girl()
    {
        $age_girl = Db::table('student')
            ->where('sex','=',1)
            ->select();
        echo "<pre>";print_r($age_girl);echo"</pre>";
    }
    // 查询男同学的信息
    public function sex_man()
    {
        $sex_man = Db::table('student')
            ->where('sex','=',0)
            ->select();
        echo "<pre>";print_r($sex_man);echo"</pre>";
    }
    // 查询综合积分在80分以上的同学的信息
    public function score_80()
    {
        $score_80 = Db::table('student')
            ->where('score','>',80)
            ->select();
        echo "<pre>";print_r($score_80);echo"</pre>";
    }
    // 查询综合积分小于59的学生的姓名和年龄
    public function score50()
    {
        $score50 = Db::table('student')
            ->where('score','<',59)
            ->field('stu_name,age')
            ->select();
        echo "<pre>";print_r($score50);echo"</pre>";
    }
    // 查询年龄在18-25随之间的学生信息
    public function age_and()
    {
        $age_and = Db::table('student')
            ->where([
                    ['age','>',18],
                    ['age','<',25],
            ])
            ->select();
        echo "<pre>";print_r($age_and);echo"</pre>";
    }
    // 查询女同学 年龄小于20的学生的姓名 年龄
    public function age_less()
    {
        $age_less = Db::table('student')
            ->where('age','<',20)
            ->field('stu_name,age')
            ->select();
        echo "<pre>";print_r($age_less);echo"</pre>";
    }
    // 查询id为5的一条数据
    public function id()
    {
        $id = Db::table('student')
            ->where('stu_id',5)
            ->find();
        echo "<pre>";print_r($id);echo"</pre>";
    }
    // 查询综合积分小于70的
    public function score70()
    {
        $score70 = Db::table('student')
            ->where('score','>',70)
            ->select();
        echo "<pre>";print_r($score70);echo"</pre>";
    }
    // 查询id为5-10之间的同学的综合积分
//    public function scoreId()
//    {
//        $scoreId = Db::table('student')->where('stuid')
//    }
    // 插入一条或多条数据
    public function insert()
    {
        $date = [
            ['stu_name'=>'来梓轩','sex'=>0,'age'=>18,'score'=>90],
            ['stu_name'=>'李树敏','sex'=>0,'age'=>17,'score'=>70],
        ];
        $inser =  Db::table('student')->insertAll($date);
        if ($inser){
            echo '成功';
        }else{
            echo '失败';
        }
    }
}
