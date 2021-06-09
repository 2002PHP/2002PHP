<?php
    $id = intval($_GET['id']);
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $pass = '200238root';        // 数据库密码
    $db = "root_cjg";            //使用的数据库
    // 链接数据库
    $link = new mysqli($host,$user,$pass,$db);
    $sql = "select * from p_goods where goods_id='{$id}'";
    $taet = mysqli_query($link,$sql);
    $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
    ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情业</title>
</head>
<body>
    <h1>商品详情页</h1>
    <?php echo "商品id: " ,$carry[0]['goods_id'];?><br>
    <?php echo "商品名: " ,$carry[0]['goods_name'];?><br>
    <?php echo "浏览量 : " ,$carry[0]['click_count'];?><br>
    <?php echo "商品价格: " ,$carry[0]['shop_price'];?><br>
    <?php echo "上架时间: " ,date("Y-m-d H:i:s",$carry[0]['add_time']);?><br>
</body>
</html>
