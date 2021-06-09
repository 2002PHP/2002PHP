<?php
    $host = "127.0.0.1";
        $user = "root";
        $pass = "200238root";
        $db = "root_cjg";
        $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $id = intval($_GET['id']);
        $sql = "select * from p_goods where goods_id= $id";
        $stmt =$dbh->prepare($sql);
        $res = $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        echo $row['goods_id']."<span style='color: red'>的商品信息</span>";
        echo "<hr>";
        echo "商品id: ".$row['goods_id'];echo "<hr>";
        echo "商品类型: ".$row['goods_sn'];echo "<hr>";
        echo "商品名: ".$row['goods_name'];echo "<hr>";
        echo "商品库存: ".$row['click_count'];echo "<hr>";
        echo "商品number: ".$row['goods_number'];echo "<hr>";
        echo "商品价格: ".$row['shop_price'];
        ?>

