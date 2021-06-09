<?php
        include "../5-31/db.php";
        $uid = intval($_GET['id']);
        echo "<pre>";print_r($uid);echo"</pre>";
        $sql = "select * from p_goods where goods_id='{$uid}'";
        $query = mysqli_query($link,$sql);
        $arr = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="./goods_list1.php" method="post">
    商品id: <input type="text" name="id" value="<?php echo $arr[0]['goods_id'] ?>"><br>
商品名: <input type="text" name="name" value="<?php echo $arr[0]['goods_name'] ?>"><br>
商品价格: <input type="text" name="del" value="<?php echo $arr[0]['shop_price'] ?>"><br>
商品库存: <input type="text" name="rep" value="<?php echo $arr[0]['click_count'] ?>"><br>
    <input type="submit" value="提交"><br>
</form>
</body>
</html>