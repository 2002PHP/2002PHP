<?php
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $pass = '200238root';        // 数据库密码
    $db = "root_cjg";            //使用的数据库
    // 链接数据库
    $link = new mysqli($host,$user,$pass,$db);
    $arr =10;   // 每页显示行数
    $page = empty($_GET['page'])?1:$_GET['page']; // 当前页码
    // 偏移量
    $limit = ($page-1)*$arr;

    $sql = "select * from p_goods order by goods_id desc limit $limit,$arr";
    $taet = mysqli_query($link,$sql);
    $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);

    $sql_a = "select * from p_goods";
    $taet_a = mysqli_query($link,$sql_a);
    $carry_a = mysqli_fetch_all($taet_a,MYSQLI_ASSOC);
    $carry_b = count($carry_a);
    $carry_c = $carry_b / 10;
    $carry_d = ceil($carry_c);
    echo "总页数".$carry_d;
    echo "&nbsp&nbsp&nbsp&nbsp";
    echo "当前页数".$page;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表页</title>
    <style>
        a{
            color: teal;
            text-decoration: none;
        }
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <hr>
    <?php foreach ($carry as $k=>$v){ ;?>
        <li>
            <a href="./goods_list.php?id=<?php echo $v['goods_id'];?>">
                <?php echo $v['goods_name']?>
            </a>
            <a href="./tesc.php?id=<?php echo $v['goods_id']?>">
                可编辑的信息
            </a>
        </li>
   <?php } ?>
    <hr>
    <a href="list.php?page=<?php echo $page-1;?>">上一页</a>
    <a href="list.php?page=<?php echo $page+1 ;?>">下一页</a>
    <a href="list.php?page=<?php echo $page=1?>">首页</a>
    <a href="list.php?page=<?php echo $page=174 ?>">尾页</a><hr>
    <?php for ($i=1;$i<=$carry_d;$i++) { ?>
        <a href="./list.php?page=<?php echo $page=$i ?>">
            <?php echo $i ?>&nbsp;&nbsp;&nbsp;&nbsp;
        </a>
    <?php } ?>
</body>
</html>


