<?php
    // 求用户的平均年龄
    include "db.php"; // 链接数据库
    $sql = "select * from login";   // 查找数据库中login表中的内容
    echo $sql;
    $result = mysqli_query($link,$sql);
