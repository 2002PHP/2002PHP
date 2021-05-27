<?php
    $arr = ["zhangsan","lisi","Baby","Mike","Abc","John","Jack","Zhaoliu"];
    // in_array() 检测数组中是否存在某个值
    echo'<pre>';var_dump($arr);echo'</pre>';
    var_dump(in_array("lisi",$arr));echo'</br>'; // 存在则返回true 否则flase
    $name = "lisi";
    if(in_array($name,$arr)){
        echo "$name 存在";
    }else{
        echo "$name 不存在";
    }
    