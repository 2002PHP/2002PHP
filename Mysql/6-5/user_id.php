<?php
    include "../5-31/db.php";
    // 两表联查
   /* $sql = "select p_order_info.order_id,p_order_goods.rec_id,goods_name,goods_sn,goods_number
    from p_order_info,p_order_goods where p_order_info.order_id=p_order_goods.rec_id 
    and p_order_info.order_id in (78014,78010)";
    $query = mysqli_query($link,$sql);
    $arr = mysqli_fetch_all($query);
    echo "<pre>";print_r($arr);echo"</pre>"; */
    // 三表联查
    $sql = "select p_users.user_id,user_name,reg_time,last_login,visit_count,
p_order_info.order_id,goods_amount,add_time, 
p_order_goods.rec_id,goods_number,goods_price 
from p_users,p_order_info,p_order_goods 
where p_users.user_id=p_order_info.user_id 
and p_users.user_id in (95,108)
and p_order_info.order_id=p_order_goods.order_id ";
    $query = mysqli_query($link,$sql);
    $arr = mysqli_fetch_all($query);
    echo "<pre>";print_r($arr);echo"</pre>";







































