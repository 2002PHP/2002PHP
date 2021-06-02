<?php
    // 删除
    include "db.php"; // 链接数据库
    $userid = intval($_GET['id']);
    $sql = "delete from login_history where userid=$userid";
    $arr = mysqli_query($link,$sql);
    if ($arr){
        echo "删除成功即将跳转";
        header('Refresh:1;url=session_start.php');
    }else{
        echo "删除失败即将跳转";
        header('Refresh:1;url=session_start.php');
    }