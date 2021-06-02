<?php
    // date_default_timezone_set('PRC');   //东八时区
    // 接收数据 $_POST
    // echo'<pre>';print_r($_POST);echo'</pre>';
    //使用mysqli 链接 mysqli
    include "db.php"; // 链接数据库
    mysqli_query($link,"set names utf8"); // 设置字符串
    // 处理数据库
    $uname = trim($_POST['uname']);
    $uemail = trim($_POST['uemail']);
    $udel = trim($_POST['udel']);
    $uage  = trim($_POST['uage']);
    $upass1 = trim($_POST['upass1']);
//     $upass2 = trim($_POST['upass2']);
    $upass = password_hash($upass1,PASSWORD_BCRYPT);
    // $reg_time = time();                 //注册时间
    // 转化为 date 时间格式
    $date_time = time();
//    $time_intval = intval($date_time);
    $uaddress = trim($_POST['uaddress']);

    // sql 语句
    $sql = "insert into login(`username`,`email`,`del`,`age`,`pass`,`add_time`,`address`)  
values ('{$uname}','{$uemail}','{$udel}','{$uage}','{$upass}','{$date_time}','{$uaddress}')";  // 密码加密
//    // 取数据库并判断用户是否存在 找到用户名说明用户已存在
    $sql_con = "select * from login where username='{$uname}'";
    // mysql_query 对数据库进行一次查询
    $query = mysqli_query($link,$sql_con);
    $query_all = mysqli_fetch_all($query,MYSQLI_ASSOC);
    if ($query_all){
        die("用户名已存在");
    }
// 准备执行
    $_stmt = mysqli_prepare($link,$sql);
    // 执行阶段
    $carry = mysqli_stmt_execute($_stmt);
    print_r($carry);
    if($carry){
        echo "注册成功";
        header('Refresh:3;url=login.html');
    }else{
        echo "注册失败";
    }
