<?php
        $host = "127.0.0.1";
        $user = "root";
        $pass = "200238root";
        $db = "root_cjg";
        $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $uid = intval($_GET['id']);// 使用$_GET接受传过来的id
        $sql = "select * from p_goods where goods_id=$uid";
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<pre>";print_r($row);echo"</pre>";
        ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>编辑信息</title>
</head>
<body>
    <form action="./update_ud.php" method="post">
        <table>
            <tr>
                <td>商品id</td>
                <td>
                    <input type="text" name="goods_id" value="<?php echo $row['goods_id']; ?>">
                </td>
            </tr>
            <tr>
                <td>商品名</td>
                <td>
                    <input type="text" name="goods_name" value="<?php echo $row['goods_name'] ?>">
                </td>
            </tr>
            <tr>
                <td>商品价格</td>
                <td>
                    <input type="text" name="goods_age" value="<?php echo $row['shop_price'] ?>">
                </td>
            </tr>
            <tr>
                <td>商品库存</td>
                <td>
                    <input type="text" name="rep" value="<?php echo $row['click_count'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
