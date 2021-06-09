<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "root_cjg";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $arr=10;//每页显示行数
    $page = empty($_GET['page'])?1:$_GET['page'];
    // 偏移量
    $limit = ($page-1)*$arr;

    // 当前显示页10
    $sql = "select * from p_goods order by goods_id desc limit $limit,$arr";
    $stmt = $dbh->prepare($sql);
    $res = $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // 循环所有页
    $sql_a = "select * from p_goods";
    $stmt_a =$dbh->prepare($sql_a);
    $stmt_a->execute();
    $rows_s = $stmt_a->fetchAll(PDO::FETCH_ASSOC);
    $rows_a = count($rows_s); // 当前总页数
    $rows_b =$rows_a / 10;
    $rows_c = ceil($rows_b);
    echo "总页数".$rows_c;
    echo "<hr>";
    echo "当前页".$page;
    ?>
    <h1>商品信息</h1>
<hr>
    <?php foreach ($rows as $k => $v){ ?>
            <li>
                <a href="./goods_list2.php?id=<?php echo $v['goods_id'] ?>">
                    <?php echo $v['goods_name'] ?>
                </a>
                <a href="./update2.php?id=<?php echo $v['goods_id'] ?>">
                    <span style="color: chocolate">可编辑的信息</span>
                </a>
            </li>
    <?php } ?>
        <a href="list2.php?page=<?php echo $page-1 ?>">上一页</a>
        <a href="list2.php?page=<?php echo $page+1 ?>">下一页</a>
        <a href="list2.php?page<?php $page=1 ?>">首页</a>
        <a href="list2.php?page<?php $rows_c ?>">尾页</a>
        <?php echo "<hr>" ?>
        <?php for ($i=1;$i<=$rows_c;$i++){ ?>
            <a href="./list2.php?page=<?php echo $page=$i ?>">
                <?php echo $i."页" ?>
            </a>
       <?php } ?>

