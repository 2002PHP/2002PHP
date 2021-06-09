<?php
    if ($_POST){
        session_start();
        include "db.php";
        // 接收数据 $_POST
        echo'<pre>';print_r($_POST);echo'</pre>';
        // 处理变量
        $value = trim($_POST['login_name']);
        $pass = trim($_POST['pass']);
        //sql语句
        $sql = "select * from login where username='{$value}' or email='{$value}' or del='{$value}'";
        // 查询
        $result = mysqli_query($link,$sql);
        // 获取结果
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo '<pre>';print_r($rows);echo'</pre>';
        if(empty($rows)){  // 没有这个用户
            header('Refresh:2;url=login.html');
            die("查无此人 两秒后跳转至登录页面");
        }
        // 验证密码 password_varify()
        $passall = password_verify($pass,$rows[0]['pass']);
        if($passall){
            $now = time();  // 获取当前时间戳
            $sql = "update enter set last_time={$now} where userid={$rows[0]['userid']}";
            echo "登录成功";
            // 页面跳转
            header('Refresh:0;url=session_start.php');
            // 将用户信息保存到会话中
            $_SESSION['username'] = $rows[0]['username'];
            // 向客户端设置cookie
            setcookie('userid',$rows[0]['userid']);
            // 记录登录信息
            $uid = $rows[0]['userid'];  // 用户id
            $login_time = $now;     // 登录时间
            $login_ip = $_SERVER['REMOTE_ADDR'];//用户登录ip
            $ua = $_SERVER['HTTP_USER_AGENT']; // 浏览器信息
            // sql语句
            $sql_two = "insert into login_history (`uid`,`login_time`,`login_ip`,`ua`)
    values ('{$uid}','{$login_time}','{$login_ip}','{$ua}')";
//        echo "<pre>";print_r($sql_two);echo"</pre>";
            // 准被阶段
            $tame = mysqli_prepare($link,$sql_two);
            // 执行阶段
            $carry = mysqli_stmt_execute($tame);
            if ($carry){
                echo "成功";
            }else{
                echo "失败";
            }

        }else{
            echo "密码不正确 两秒跳转至登录页面";
            header('Refresh:1;url=login.html');
        }
        die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录</title>
</head>
<body>
<form action="./login.php" method="post">
    <input type="text" name="login_name" placeholder="用户名/Email邮箱/手机号"><br>
    <input type="password" name="pass" placeholder="密码"><br>
    <input type="submit" value="登录">
</form>
</body>
</html>
