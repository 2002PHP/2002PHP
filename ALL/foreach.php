<?php
    $each  = [123,345,567,765,889,122,999,111,'cjg','lwy'];
        $length = count($each); // count 获取字符串长度
        for($i=0;$i<$length;$i++){
            echo 'i='.$i,'>>>'.$each[$i]."\n"; // 根据下标访问 十足中的元素
        };
        forEach($each as $k => $v){
            echo '$k='. $k .'++++++$v=' .$v . "\n";     
        };