<?php
    $host = "127.0.0.1";
    $db = "phplogin";
    $user = "root";
    $pass = "200238root";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // 拼接sql语句
    $sql = "select login_id,login_name from login2 where login_id= ?";
    echo $sql;echo "sql语句"."<hr>";
    // 预处理
    $stmt = $dbh->prepare($sql);
    // 查询
    $id =$_GET['id'];
    $res = $stmt->execute([$id]); // 执行sql查询 预处理方式 将query替换成execute

    // 获取错误信息 错误码 错误信息
    $err_code = $stmt->errorCode();     // 获取错误码
    if($err_code != '00000'){
        $err_msg =$stmt->errorInfo();   // 获取错误信息
        echo "出错了: ".$err_msg[2];
    }
