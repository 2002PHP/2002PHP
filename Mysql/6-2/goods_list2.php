<?php
    $id = $_GET['id']; // 用get接收list2.php
    include "../5-31/db.php";
    $sql = "select * from p_goods where goods_id='{$id}'";
    $taet =mysqli_query($link,$sql);
    $array = mysqli_fetch_all($taet,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情业2 </title>
</head>
<body>

    <h1>商品详情</h1>
        <?php
            echo "商品id : ",$array[0]['goods_id'];echo "<br>";
            echo "商品名称 :",$array[0]['goods_name'];echo "<br>";
            echo "浏览量 :",$array[0]['click_count'];echo "<br>";
            echo "价格 :",$array[0]['shop_price'];echo "<br>";
            echo "上架时间 :",$array[0]['add_time'];echo "<br>";
        ?>
</body>
</html>
