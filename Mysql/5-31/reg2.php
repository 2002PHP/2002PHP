<?php
    // date_default_timezone_set('PRC');   //东八时区
    // 接收数据 $_POST
    //使用mysqli 链接 mysqli
    if ($_POST){
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
            header('Refresh:0;url=login.html');
        }else{
            echo "注册失败";
        }
        die();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
</head>
<body>
<form action="./reg2.php" method="post">
    <h1>用户注册</h1>
    <input type="text" name="uname" placeholder="用户名"><br>
    <input type="Email" name="uemail" placeholder="Email"><br>
    <input type="text" name="udel" placeholder="手机号"><br>
    <input type="text" name="uage" placeholder="年龄"><br>
    <input type="text" name="uaddress" placeholder="地址"><br>
    <input type="password" name="upass1" placeholder="密码"><br>
    <input type="password" name="upass2" placeholder="确认密码"><br>
    <input type="reset" value="重置">
    <input type="submit" value="提交">
</form>
</body>
</html>
