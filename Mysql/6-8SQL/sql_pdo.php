<?php
    $host ="127.0.0.1";
    $db = 'phplogin';
    $user = 'root';
    $pass = '200238root';
    $dbh = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
    var_dump($dbh);echo "链接数据库输出". "<hr>";
    $sql = "select * from login2 where login_id= ?";
    echo "sql语句输出". $sql; echo "<hr>";
    // 预处理
    $stmt = $dbh->prepare($sql);  // 执行预处理
    var_dump($stmt);echo "执行预处理"."<hr>";
    // 执行sql语句
    $id = $_GET['id'];
    $res = $stmt->execute([$id]); // 填充占位符
    // 获取错误信息
    $err_code = $stmt->errorCode(); // 获取statement 错误码
    var_dump($err_code);echo "错误码"."<hr>";
    $err_msg = $stmt->errorInfo();
    var_dump($err_msg);echo "错误信息"."<hr>";
    // 获取查询结果
    var_dump($res); echo "占位符"."<hr>";
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";print_r($rows);echo"</pre>"; echo "查询结果"."<hr>";