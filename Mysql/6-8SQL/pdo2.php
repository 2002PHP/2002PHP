<?php
    //使用pdo 操作数据库
    // 1 连接数据库
    $host = "127.0.0.1";        //数据库地址
    $db = 'root_cjg';            //数据库名
    $user = 'root';             //数据库用户名
    $pass = '200238root';        // 数据库的用户密码
    $dbh = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    // select user_id,username from p_users where user_id=123
    $sql = "select * from p_users where user_id= ?";        //预处理 ？占位
//    echo $sql;echo '</br>';
    // 预处理
    $stmt = $dbh->prepare($sql);                //执行预处理

    //执行sql语句
    $id = $_GET['id'];
    $res = $stmt->execute([$id]);               // 填充占位符

    //获取错误信息
    $err_code = $stmt->errorCode();              //获取 statement 错误码
//    var_dump($err_code);
    $err_msg = $stmt->errorInfo();               //获取 statement 错误信息
//    var_dump($err_msg);

    //获取查询结果
//    var_dump($res);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';print_r($rows);echo '</pre>';

