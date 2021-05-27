<?php
    $arr1 = ['cjg','bjl','lwy'];
    $arr2 = ['zs','whj','gf'];
    echo'<pre>';var_dump($arr1);echo'</pre>';
    echo'<pre>';var_dump($arr2);echo'</pre>';
    echo'<hr>';
    // array_merge // 合拼一个或多个是数组
    $arr3 = array_merge($arr1,$arr2);
    echo'<pre>';var_dump($arr3);echo'</pre>';