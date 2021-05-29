<?php
    // 使用mysqli 使用MYSQL
    /*$host ="127.0.0.1";  // mysql的主机地址   
    $user = 'root';      // 数据库的用户名
    $pass = '200238root';   // 数据库密码
    $db = "root_cjg"  ;      // 使用数据库
    $link = new mysqli($host,$user,$pass,$db);

    // 获取 root_cjg 表中的数据
    $sql = "select * from good";

    // 执行一个 查询
    $result = mysqli_query($link,$sql);

    // 获取记录 
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo '<pre>';print_r($rows);echo '</pre>'; */

    // 使用mysqli 链接 mysql
    $host = "127.0.0.1";    // 使用mysql 的主机地址
    $user = "root";         // 数据库的用户名
    $pass = "200238root";   // 数据库的密码
    $db = "root_cjg";       // 使用的数据库

    $link = new mysqli($host,$user,$pass,$db);

    // 获取 good 表中的数据
    $sql = "select * from good";

    // 执行一个 查询
    $result = mysqli_query($link,$sql);

    // 获取记录
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo '<pre>';print_r($rows);echo '</pre>';