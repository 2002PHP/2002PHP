<?php
        include "../5-31/db.php";
        $arr = $_POST;
        $uid = $arr['id'];
        $uname = $arr['name'];
        $price = $arr['del'];
        $rep = $arr['rep'];
        $sql = "update p_goods set goods_name='$uname',shop_price='$price',click_count='$rep'
 where goods_id = '$uid'";
        $query = mysqli_prepare($link,$sql);
        $arr = mysqli_stmt_execute($query);
        if ($arr){
            echo "修改成功即将转跳";
            header('Refresh:2;url=list.php');
        }else{
            echo "修改失败";
        }
    ?>
