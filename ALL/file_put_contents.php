<?php
    $f = "./text";
    // echo file_get_contents($f); // 查看内容
    $data = "xxxxx";
    $de = file_put_contents($f,$data,FILE_APPEND);
    echo file_get_contents($de);