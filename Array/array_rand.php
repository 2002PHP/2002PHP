<?php
    $arr = ["zhangsan","lisi","Baby","Mike","Abc","John","Jack","Zhaoliu"];
    echo'<pre>';print_r($arr);echo'</pre>';
    $k = array_rand($arr,3);
    echo'<pre>';print_r($k);echo'<pre>';
    // array_rand 从数组中取出一个或多个随机键
    echo $arr[$k[0]];echo'<br>';
    echo $arr[$k[1]];echo'<br>';
    echo $arr[$k[2]];
    // die;
    echo '<hr>';
    echo'<pre>';print_r($arr);echo'<pre>';
    $k =array_rand($arr); // 随机一个key
    echo "随机的key是:".$arr[$k];echo'<br>';
    echo $k;
