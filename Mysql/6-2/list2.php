<?php
    include "../5-31/db.php";
    $size = 10; //每一页展示多少数据
    $page = empty($_GET['page'])?1:$_GET['page'];
    $start = ($page - 1) * $size;
//  $sql = "select * from p_goods order by goods_id desc limit 0,10";
//  $sql = "select * from p_goods order by goods_id desc limit 10,10";
//  $sql = "select * from p_goods order by goods_id desc limit 20,10";
    $sql = "select * from p_goods order by goods_id desc limit $start,$size";
    $tate = mysqli_query($link,$sql);
    $array =mysqli_fetch_all($tate,MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表✌副本</title>
</head>
<body>
    <?php foreach ($array as $k => $v){ ;?>
            <li>
                <a href="./goods_list2.php?id=<?php echo $v['goods_id'];?>">
                    <?php echo $v['goods_name'];?>
                </a>
            </li>
    <?php } ?>
    <a href="./list2.php?page=<?php echo $page-1;?>">上一页</a>
    <a href="./list2.php?page=<?php echo $page+1;?>">下一页</a>
</body>
</html>

