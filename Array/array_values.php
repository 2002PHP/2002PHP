<?php
    $arr = ["zhangsan","lisi","Baby","Mike","Abc","John","Jack","Zhaoliu"];
    $arr2 = [
        "name" => "zhangsan",
        "age"  => "19",
        "email" => "zhangsan@qq.com"
    ];
    $arr3 = [
        "p1"  => ["zzz","cccc"],
        "p2"  => ["aaa","bbbb"],
    ];
    // array_values 返回数组中所有的值 并建立数字索引
    echo '<pre>';print_r($arr3);echo'<pre>';
    $v = array_values($arr3);
    echo'<pre>';print_r($v);echo'<pre>';