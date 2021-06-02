<?php
    $now = time();      // 获取当前时间戳
    echo $now;echo "<br>";
    echo date("Y-m-d H:i:s",$now);echo "<br>";

    // 将年月日 时分秒转为 unix时间戳
    $ymd = '2021-06-01 10:16:34';
    echo "年月日: " . $ymd;echo "<br>";
    echo "转为时间戳 : " . strtotime($ymd);