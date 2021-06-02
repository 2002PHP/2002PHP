<?php
     for($i=10;$i>=0;$i--){
             echo "<br>";
         for($j=1;$j<=$i;$j++){
             echo "*=*";
         }
     }
    $n=5;
    for($c=1;$c<=$n;$c++) {
        for ($d=1; $d<=$n-$d;$d++){
        echo ' ';
    }
    for($e=1;$e<=($c-1)*2+1;$e++){
        echo '*';
    }echo '<br/>';
    }