<?php
    echo "<pre>";print_r($_POST);echo"</pre>";
    include "db.php"; // 包含相同的数据
    // 处理数据
    $name = trim($_POST['uname']);
    $age = trim($_POST['uage']);
    $site = trim($_POST['usite']);

    // sql 语句
   $sql = "insert into tab(username,age,dz)
values ('{$name}','{$age}','{$site}')";
   // 准备阶段
    $stmt = mysqli_prepare($link,$sql);
    // 执行
    $carry = mysqli_stmt_execute($stmt);
    if($carry){
        echo "成功";
    }else{
        echo "失败";
    }