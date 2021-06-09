<?php
    include "../db.php";

    //$sql = "select * from p_goods";
    //$sql = "select goods_id,goods_name from p_goods";
//    $sql = "select goods_id,goods_name from p_goods limit 0,10";            // 第一页
//    $sql = "select goods_id,goods_name from p_goods limit 10,10";           // 第二页
//    $sql = "select goods_id,goods_name from p_goods limit 20,10";           // 第三页

    $page = intval($_GET['page']);
    if($page<1){
        $page = 1;
    }

    $size = 10;             //每一页展示多少数据

    //计算上一页
    $prev = $page - 1;
    if($prev<1){
        $prev = 1;
    }
    //计算下一页
    $next = $page + 1;

    echo "当前页： ". $page; echo '</br>';

    $start = ($page - 1) *  $size;              //跳过的行数  从多少行开始
    echo "start: " . $start;echo '</br>';

    $sql = "select goods_id,goods_name from p_goods limit {$start},{$size}";
    echo "sql: ". $sql;echo '</br>';

    $res = mysqli_query($link,$sql);

    $rows = mysqli_fetch_all($res,MYSQLI_ASSOC);

    echo "<ul>";

    foreach($rows as $k=>$v){
        echo "<li>";
        echo  $v['goods_id'] . ' ' .$v['goods_name'];
        echo "</li>";
    }

    echo "</ul>";


?>

<hr>
<a href="list.php?page=<?php echo $prev;?>">上一页</a> | <a href="list.php?page=<?php echo $next;?>">下一页</a>

