<?php
    // 使用mysqli连接 MySQL
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $upass = '200238root';        // 数据库密码
    $db = "phplogin";            //使用的数据库
    // 链接数据库
    $link = new mysqli($host,$user,$upass,$db);
    echo "<pre>";print_r($_POST);echo"</pre>";
    // 处理变量
    $uname = trim($_POST['uname']);
    $ueamil = trim($_POST['ueamil']);
    $del = trim($_POST['udel']);
    $upass = trim($_POST['upass']);
    $upass2 = password_hash($upass,PASSWORD_BCRYPT);
    $upassall = trim($_POST['upass2']);
    $upassall2 = password_hash($upassall,PASSWORD_BCRYPT);
    $time = time();
    // 检测用户名eamil 手机号是否已存在
    $sql_a = "select login_name,login_eamil,login_del from login2 where 
    login_name='{$uname}' or login_eamil='{$ueamil}' or login_del='{$del}'";
    $que = mysqli_query($link,$sql_a);
    $array = mysqli_fetch_all($que);
    if ($array){
        die("用户名已经存在");
    }
    // sql语句
    $sql = "insert into login2(login_name,login_eamil,login_del,pass,passall,log_time)
        values ('{$uname}','{$ueamil}','{$del}','{$upass2}','{$upassall2}','{$time}')";
    $query = mysqli_prepare($link,$sql);
    $arr = mysqli_stmt_execute($query);
    if($arr){
        echo "注册成功即将跳转到登录页面";
        header('Refresh:2;url=enter.html');
    }else{
        echo "注册失败";
    }

