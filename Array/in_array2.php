<?php
    $arr = [
      "name"  => "cjg",
        "age"  =>    18,
        "addrss" => "北京"
    ];
    if(in_array("cjg",$arr)){
        echo "存在";
    }else{
        echo "不存在";
    }
