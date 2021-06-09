<?php
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $upass = '200238root';        // 数据库密码
    $db = "phplogin";            //使用的数据库

    // 链接数据库
    $link = new mysqli($host,$user,$upass,$db);
    echo "<pre>";print_r($_POST);echo"</pre>";
    // 处理变量
    $uname = trim($_POST['uname']);
    $udel = trim($_POST['udel']);
//    $uscore = trim($_POST['sel']);
    $c_name = trim($_POST['uclass']);
    $utime = time();
    // sql语句
    $sql = "insert into student(stu_name,stu_age,class_name,stu_time)
    values ('{$uname}','{$udel}','{$c_name}','{$utime}')";
    $query = mysqli_prepare($link,$sql);
    $arr = mysqli_stmt_execute($query);
    if ($arr){
        echo "成功";
    }else{
        echo "失败";
    }

