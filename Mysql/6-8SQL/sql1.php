<?php
    include "../5-31/db.php";
    $id = intval($_GET['id']);
    $sql = "select * from p_users where user_id={$id}";
    $ser = mysqli_query($link,$sql);
    $arr = mysqli_fetch_all($ser,MYSQLI_ASSOC);
    echo "<pre>";print_r($arr);echo"</pre>";
