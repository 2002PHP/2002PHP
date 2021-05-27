<?php
    // 生成随机字符串 $length是 返回的字符串长度
    function str_rand($length=8){
        $str1 = 'ABCDEFGHIJKMNPQRSTVWXYZabcdefghijkmnpqrstuvwxyz23456789'; // 要随机的数
        $str = ""; 
        for($i=0;$i<$length;$i++){
            $num = mt_rand(0,55);
            echo "随机数:".$num;echo'<hr>'; // 随机数的下标
            echo "随机的字母:".$str1[$num];echo'<hr>'; // 随机数下标对应的字母或数字
            $c = $str1[$num];
            $str .= $c;
        }
        return $str;
    }

    // 调用函数
    var_dump(str_rand());