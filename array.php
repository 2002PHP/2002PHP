<?php
    $arr1 = [
        11,22,33,44,55
    ];
    echo $arr1[2];
    echo "\n";
    echo count($arr1);

    $arr1 = array(
        'name' => 'cjg',
        'nl'   =>  '18',
        'email' => '2192058719'
    );
    // 第一种提交方式
    echo var_dump($arr1);
    // 第二种方式
    echo print_r($arr1);