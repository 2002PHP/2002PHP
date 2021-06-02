<?php
    // 接收form 表单数据 使用 $_POST
    echo'<pre>';print_r($_POST);echo'</pre>';
    include "db.php"; // 包含相同的数据
    // 处理数据库
    $uname = trim($_POST['uname']);
    $uemail = trim($_POST['uemail']);
    $umobil = trim($_POST['umobil']);
    $upass  = trim($_POST['upass']);

    //sql语句
    $sql = "insert into users (username,email,mobile,pass) 
values ('{$uname}','{$uemail}','{$umobil}','{$upass}')";
    print_r($sql);
    // 准备阶段
    $stmt = mysqli_prepare($link,$sql);
    // 执行阶段
    $result = mysqli_stmt_execute($stmt);
    if($result){
        echo "insert 登录成功";
    }else{
        echo "insert 登录失败";
    }