<?php
    // 删除
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "phplogin";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // 使用$_GET接受id
    $login_id = intval($_GET['id']);
    $sql = "delete from login_history where login_id=?";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(1,$login_id);
    $res = $stmt->execute();
    if ($res){
        echo "删除成功";
    }else{
        echo "删除失败";
    }

