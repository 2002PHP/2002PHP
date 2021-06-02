<?php
    // 接收 URL 参数
    // 强制类型转换 转为 intval  trim
    // $userid = intval($_GET['id']);     // 用户id
    $goodsname = trim($_GET['name']);    // 处理字符串

     // 使用mysqli 链接 mysql
    $host = "127.0.0.1";    // 使用mysql 的主机地址
    $user = "root";         // 数据库的用户名
    $pass = "200238root";   // 数据库的密码
    $db = "root_cjg";       // 使用的数据库
    // 链接数据库
    $link = new mysqli($host,$user,$pass,$db);

    // 获取 good 表中的数据
    $sql = 'select * from good where goodsname="'.$goodsname.'"';

    // 执行一个 查询
    $result = mysqli_query($link,$sql);

    // 获取记录
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo '<pre>';print_r($rows);echo '</pre>';