<?php
    // 使用pdo 查询数据

    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "phplogin";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    //拼装sql语句
    $sql = "select user_id,user_name from p_users where user_id= ? and user_name= ?";
    echo $sql;echo '</br>';

    //预处理
    $stmt = $dbh->prepare($sql);

    //查询
    $id = $_GET['id'];
    $name = $_GET['name'];
    $res = $stmt->execute([$id,$name]);    //执行sql查询
    var_dump($res);

    //获取错误信息   错误码 错误信息
    $err_code = $stmt->errorCode();         //获取错误码
    if($err_code != '00000'){
        echo "1111";
        $err_msg  = $stmt->errorInfo();          //获取错误信息
        echo "出错了： " .$err_msg[2];
        die;
    }
    //或去数据
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);            //获取多条数据  fectchAll()
    //$row = $stmt->fetch(PDO::FETCH_ASSOC);              //获取一条数据 fetch()
    echo '<pre>';print_r($rows);echo '</pre>';




