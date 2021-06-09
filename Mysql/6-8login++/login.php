<?php
    session_start();// 开启会话
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "phplogin";
    $dbh = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    echo "<pre>";print_r($_POST);echo"</pre>";
    $name = trim($_POST['uname']);
    $pass = trim($_POST['pass']);
    // 拼装sql语句
    $sql = "select * from reg where reg_name= ? or reg_eamil= ? or reg_del= ? ";
    echo $sql;echo "<hr>";
    // 预处理
    $stmt = $dbh->prepare($sql);  // 返回结果对象 statement
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$name);
    $stmt->bindParam(3,$name);
    $res = $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);  //从结果集中取得所有的关联数组
    echo "<pre>";print_r($rows);echo"</pre>";
    if (empty($rows)){
        die("查无此人");
    }
        // password_verify() 验证密码
    if(password_verify($pass,$rows['reg_pass1'])){
        echo "登录成功两秒后转跳至个人中心";
        header('Refresh:2;url=sekie.php');
        $time = time();
        // 将用户信息保存到会话中
        $_SESSION['reg']= $rows;
        // 将登陆时间记录到session中
        $_SESSION['login_time']=$time;
        // 向客户端设置cookie
        setcookie('reg_id',$rows['reg_id']);
        // 记录登录信息
        $reg_id = $rows['reg_id']; // 记录用户id
        $login_time= $time; // 登录时间
        $login_ip = $_SERVER['REMOTE_ADDR'];// 用户ip
        $ua = $_SERVER['HTTP_USER_AGENT'];// 浏览器信息
        $sql = "insert into login_history(`reg_id`,`login_time`,`login_ip`,`login_ua`)
values (?,?,?,?)";
        // 预处理
        $stmt = $dbh->prepare($sql);
        // 绑定参数
        $stmt->bindParam(1,$reg_id);
        $stmt->bindParam(2,$login_time);
        $stmt->bindParam(3,$login_ip);
        $stmt->bindParam(4,$ua);
        // 执行
        $stmt->execute();
        // 查看sql执行受影响的行数
        $affect_rows = $stmt->rowCount();
        echo "受影响的行数".$affect_rows;
        if ($affect_rows>0){
            echo "登录成功";
        }else{
            echo "注册失败";
        }
    }else{
        echo "登录失败两秒专跳至登陆页面";
        header('Refresh:2;url=login.html');
    }



