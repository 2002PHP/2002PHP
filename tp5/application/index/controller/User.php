<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class User extends Controller
{
    /*
     * 用户注册
     */
    public function reg()
    {
        // 显示视图
        return $this->fetch();  // 显示模板
    }
    /*
     * 注册逻辑
     */
    public function reg2()
    {
        echo "<pre>";print_r($_POST);echo"</pre>";
        $name = trim($_POST['u_name']);
        $eamilt = trim($_POST['u_email']);
        $del = trim($_POST['u_mobile']);
        $age = trim($_POST['u_age']);
        $site = trim($_POST['u_address']);
        $pass = trim($_POST['u_pass1']);
        $pass2 = trim($_POST['u_pass2']);
        $time = time();
        if ($pass == $pass2){
            $password = password_hash($pass,PASSWORD_BCRYPT);
            $password2 = password_hash($pass2,PASSWORD_BCRYPT);
        }else{
            die("密码不一致");
        }
        $data = ['tp_name' => $name , 'tp_eamil'  => $eamilt,
                 'tp_del'  => $del  , 'tp_age'   => $age,
                 'tp_site' => $site , 'tp_pass1' => $password,
                 'tp_pass2'=> $password2 ,'tp_time'  => $time];
        $arr = Db::table('tp_reg')->insert($data);
        if ($arr){
            echo "成功";
        }else{
            echo "失败";
        }
    }
    /*
     * 登录展示
     */
    public function login()
    {
        return $this->fetch();
    }
    /*
     * 退出登录
     */
    public function logout()
    {
        // 清除session 的用户信息
        Session::delete('tp_id');
        Session::delete('tp_name');
        // 跳转 页 面
        return redirect('/us/login');
    }
    /*
     * 登 录 逻 辑
     */
    public function loginDb()
    {
        echo "<pre>";print_r($_POST);echo"</pre>";
        $name = trim($_POST['name']);
        $pass = trim($_POST['pass']);
        $arr = Db::table('tp_reg')
            ->field('tp_id,tp_name,tp_eamil,tp_del,tp_pass1,tp_pass2')
            ->where("tp_name",$name)
            ->find();
        echo "<pre>";print_r($arr);echo"</pre>";
        if ($arr){
            if (password_verify($pass,$arr['tp_pass1'])){
                // 记录登录历史
                $history = [
                    'his_id'     => $arr['tp_id'],
                    'login_time' => time(),
                    'login_ip'   => $_SERVER['REMOTE_ADDR'], // 用户ip
                    'login_ua'   => $_SERVER['HTTP_USER_AGENT'], // 用户ua
                ];
                Db::name('tp_history')->insert($history);
                // 设置session
               Session::set('tp_id',$arr['tp_id']);
               Session::set('tp_name',$arr['tp_name']);
                $this->success('登录成功','user/center');
            }else{
                $this->error('登录失败','user/login');
            }
        }else{
            die('用户不存在');
        }
    }
    /*
     * 个人中心
     */
    public function center()
    {
         $sess = Session::get(); // 获取当前session
         if (empty($sess['tp_id']) && empty($sess['tp_name'])){
            // 未登录
             return redirect('/us/login');
         }
        $state = Db::table('state')->where('uid',$sess['tp_id'])->select();
        foreach ($state as $k => $v){
            $state[$k]['time'] = date('Y-m-d H:i:s',$v['time']);
        }
        $this->assign('state',$state);
         $reg_id = Session::get('tp_id');
         // 查询数据库用户信息
        $u = Db::table('tp_reg')
            ->field('tp_id,tp_name,tp_eamil,tp_del,tp_time')
            ->where("tp_id",$reg_id)
            ->find();
        // 查询用户的登录信息
        $history = Db::table('tp_history')
            ->where('his_id',$reg_id)
            ->select();
        // 处理 字段
        foreach ($history as $k => $v){
            $history[$k]['login_time'] = date('Y-m-d H:i:s',$v['login_time']);
        }
        $this->assign('name',$u['tp_name']);
        $this->assign('eamil',$u['tp_eamil']);
        $this->assign('time',$u['tp_time']);
        $this->assign('history',$history);
        return $this->fetch();
    }
    /*
     * 删 除 记 录
     */
        public function mov($id)
        {
            $del = Db::table('tp_history')->where('id',$id)->delete();
            var_dump($del);
        }
    /*
     * 电影评分
     */
    /*
     * 评分逻辑
     */
    public function movieScore()
    {
        $session = Session::get();
        echo "欢迎: ".$session['tp_name'];
        if (empty($session['tp_id']) && empty($session['tp_name'])){
            die("请先登录");
            return redirect('/us/login');
        }
        $reg_id = Session::get('tp_id');
        $arr = Db::table('movies')->field('id,movie_name,score')->select();
        foreach ($arr as $k=>$v){
            $avg = ceil(Db::table('movie_score')->where('movie_id',$v['id'])->avg('score'));
//           echo "计算id为{$v['id']} 的平均分数 : {$avg}";echo '<hr>';
            $arr[$k]['score'] = $avg;
        }
        $this->assign('arr',$arr);
        return $this->fetch();
    }
    public function movs()
    {
        echo "<pre>";print_r($_POST);echo"</pre>";
        $sess = Session::get();
        $res = Db::table('movies')->select();
        foreach ($res as $k=>$v){
            $number = intval($_POST['num'][$k+1]);
            if ($number<0){
                $number=0;
            }else if ($number>100){
                $number=100;
            }
            $date = [
                'movie_id' =>$k+1,
                'uid'=>$sess['tp_id'],
                'score'=>$number
            ];
            $daa = Db::table('movie_score')->insert($date);
            if ($daa){
                echo "成功";
            }
        }
    }
    /*
     * 删除
     */
    public function movie()
    {
        $min = 1;
        $max = 100;
        $mt = mt_rand($min,$max);
        echo "生成的随机数:". $mt;
    }
    /*
     * 用户抽奖
     */
    public function prize()
    {
        $sess = Session::get();
        echo "欢迎:".$sess['tp_name'];
        if (empty($sess['tp_id']) && empty($sess['tp_name'])){
            die("请先登录");
            return redirect('/prize/prize');
        }
        $rand = 38 ;
        $rsd = intval(mt_rand(1,100));echo "<hr>";
        echo "生成的随机数:".$rsd; echo "<br>";
        $now = time();
        $before = $now -60;
        echo "当前时间戳: ".">>>>".date('Y-m-d H:i:s',$now);echo "<br>";
        echo "一分钟之前: ".'>>>>'.date('Y-m-d H:i:s',$before);echo "<br>";
        // 根据时间戳获取抽奖次数
        $num = Db::table('prize')->where('uid',$sess['tp_id'])->count();
        var_dump($num);
        if ($num>=3){
            echo "<hr>";
            die("抽奖次数受限,仅限三次");
        }
        if ($rsd){
            if ($rsd==$rand){
                echo "<hr>";
                echo "一等奖";
            }else if ($rsd==19 or $rsd==34){
                echo "<hr>";
                echo "二等奖";
            }else if ($rsd==78 or $rsd==90 or $rsd==45){
                echo "<hr>";
                echo "三等奖";
            }else{
                echo "<hr>";
                echo "未中奖";
            }
        }
        if ($rsd==$rand){
            $date = [
                'uid'=>$sess['tp_id'],
                'add_time'=>$now,
                'uname'=>$sess['tp_name'],
                'rand' =>$rsd,
                'rands' => "一等奖"
            ];
            Db::table('prize')->insert($date);
        }else if ($rsd==19 or $rsd==34){
            $date = [
                'uid'=>$sess['tp_id'],
                'add_time'=>$now,
                'uname'=>$sess['tp_name'],
                'rand' =>$rsd,
                'rands' => "二等奖"
            ];
            Db::table('prize')->insert($date);
        }else if ($rsd==78 or $rsd==90 or $rsd==45){
            $date = [
                'uid'=>$sess['tp_id'],
                'add_time'=>$now,
                'uname'=>$sess['tp_name'],
                'rand' =>$rsd,
                'rands' => "三等奖"
            ];
            Db::table('prize')->insert($date);
        }else{
            $date = [
                'uid'=>$sess['tp_id'],
                'add_time'=>$now,
                'uname'=>$sess['tp_name'],
                'rand' =>$rsd,
                'rands' =>"未中奖"
            ];
            Db::table('prize')->insert($date);
        }
    }
    /*
     * 定坐
     */
    public function cust()
    {
        $sess = Session::get();
        if (empty($sess)){
            die('请先登录');
        }
        $arr = Db::table('state')->select();
        $this->assign('arr',$arr);
        return $this->fetch();
    }
    public function custs()
    {
        $sess = Session::get();
       Db::table('state')
           ->where('sord',$_POST['del'])
           ->update(['uid'=>$sess['tp_id'],'state'=>'已','time'=>time()]);
       $add = Db::table('state')
            ->select();
       if ($add[0]['uid'] == NULL){
            echo "预定成功";
       }else{
           die("该坐位已被预定");
       }
    }
    public function custsdelete()
    {
        echo "<pre>";print_r($_POST);echo"</pre>";
        $sess = Session::get();
        Db::table('state')
            ->where('sord',$_POST['de'])
            ->update(['uid'=>NULL,'state'=>'未']);
    }
}





