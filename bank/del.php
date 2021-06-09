<?php
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $upass = '200238root';        // 数据库密码
    $db = "phplogin";            //使用的数据库

    // 链接数据库
    $link = new mysqli($host,$user,$upass,$db);
    $_id = $_GET['id'];
    $sql = "delete from question_bank2 where q_id='$_id'";
    $arr = mysqli_query($link,$sql);
    if ($arr){
        echo "删除成功";
    }else{
        echo "删除失败";
}
