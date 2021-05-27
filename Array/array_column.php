<?php
    $arr = [
        ["name"=>"zhangsan","age"=>"18","email"=>"zhangsna@qq.com"],
        ["name"=>"cjg","age"=>"18","email"=>"cjg@qq.com"],
        ["name"=>"lwy","age"=>"17","email"=>"lwy@qq.com"],
        ["nmae"=>"why","age"=>"26","email"=>"why@qq.com"],
    ];
    echo '<pre>';print_r($arr);echo'</pre>';
    // array_column()返回数组中一个的一列
    $arr_age = array_column($arr,"age");
    $arr_name = array_column($arr,"name");
    echo'<pre>';print_r($arr_age);echo'</pre>';
    echo'<pre>';print_r($arr_name);echo'</pre>';