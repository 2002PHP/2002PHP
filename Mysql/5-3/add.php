<?php
    include "../5-31/db.php";
    mysqli_query($link,"set names utf8"); // 设置字符串
    echo "<pre>";print_r($_POST);echo"</pre>";
    $name = trim($_POST['uname']);
    $del = trim($_POST['udel']);
    $rep = trim($_POST['urep']);
    $desc = trim($_POST['desc']);
    $sql = "insert into p_goods(goods_name,shop_price,click_count,goods_desc)
values ('{$name}','{$del}','{$rep}','{$desc}')";
    $query = mysqli_prepare($link,$sql);
    $arr = mysqli_stmt_execute($query);
    if ($arr){
        echo "添加成功";
    }else{
        echo "添加失败";
    }