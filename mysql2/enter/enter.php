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
    $name = trim($_POST['uname']);
    $pass = trim($_POST['pass']);
    // 判断用户是否存在
    $sql = "select login_name,login_eamil,login_del from login2 where login_name=
    '{$name}' or login_eamil='{$name}' or login_del='{$name}'";
    $query = mysqli_query($link,$sql);
    $arr = mysqli_fetch_all($query);
    if(empty($arr)){
        die("查无此人即将跳转到登录页面");
    }
    // 判断密码
    $sql_a = "select pass from login2 where pass='{$pass}'";
    $que = mysqli_query($link,$sql_a);
    $arr_a = mysqli_fetch_all($que);
    echo "<pre>";print_r($arr_a);echo"</pre>";
    if($arr_a){
        echo "登录成功即将跳转到个人中心";
        header('Refresh:2;url=center.php');
    }else{
        echo "密码错误";
    }



