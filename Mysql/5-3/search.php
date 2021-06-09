<?php
    include "../5-31/db.php";
    $content = trim($_GET['seek']);
    $add = 5;
    $page = empty($_GET['page'])?1:$_GET['page'];
    $limit = ($page-1)*$add;
    $sql = "select goods_id,goods_name from p_goods where goods_name like '%{$content}%' limit $limit,$add";
    $query = mysqli_query($link,$sql);
    $arr = mysqli_fetch_all($query,MYSQLI_ASSOC);

    $len = count($arr);
    var_dump($len);
    if($len<1){
        header('Refresh:1; url=./search.html');
        echo "已经没有更多了 即将跳转到搜索";
    }

?>
<?php echo "<h2><?php echo $content; ?>搜索结果<h2>"; ?>
<?php foreach ($arr as $k => $v){ ?>
    <?php
        // 关键字高亮显示
        $replace = "<span style='color: red'>{$content}</span>";
        $new_name = str_replace($content,$replace,$v['goods_name']);
    ?>
        <li>
            <a href="./goods_list.php?id=<?php echo $v['goods_id'] ?>">
                <?php echo $v['goods_name'],$new_name ?>
            </a>
        </li>
<?php } ?>
        <a href="search.php?page=<?php echo $page-1;?>&seek=<?php echo $content ;?>">上一页</a>
        <a href="search.php?page=<?php echo $page+1 ;?>&seek=<?php echo $content;?>">下一页</a>

