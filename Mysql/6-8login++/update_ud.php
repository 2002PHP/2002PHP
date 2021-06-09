<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "root_cjg";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // 使用$_post接受
    $post = $_POST;
    $uid =$post['goods_id'];
    $uname = $post['goods_name'];
    $uage = $post['goods_age'];
    $urep = $post['rep'];
    $sql = "update p_goods set goods_name=?,shop_price=?,click_count=? 
where goods_id = $uid";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(1,$uname);
    $stmt->bindParam(2,$uage);
    $stmt->bindParam(3,$urep);
    $stmt->execute();
    // 检查执行结果 (insert 影响的行数)
    $row_count = $stmt->rowCount();
    if ($row_count){
        echo "修改成功";
    }else{
       echo "修改失败";
    }

