<?php
    // 链接数据库
    // 使用mysqli连接 MySQL
    $host = "127.0.0.1";        // Mysql的主机地址
    $user = 'root';             //数据库的用户名
    $upass = '200238root';        // 数据库密码
    $db = "phplogin";            //使用的数据库

    // 链接数据库
    $link = new mysqli($host,$user,$upass,$db);
    echo "<pre>";print_r($_POST);echo"</pre>";
    // 处理变量
    $uname = trim($_POST['uname']);
    $udel = trim($_POST['udel']);
    $utime = time();
    // sql
    $sql = "insert into question_bank2(q_name,q_man,q_time)
    values ('{$uname}','{$udel}','{$utime}')";
    $query = mysqli_prepare($link,$sql);
    $arr = mysqli_stmt_execute($query);
    if ($arr){
        echo "添加成功";
    }else{
        echo "添加失败";
    }
//    $cid = $_COOKIE['id'];
    $sql_a = "select * from question_bank2";
    $qu = mysqli_query($link,$sql_a);
    $add = mysqli_fetch_all($qu);
    echo "<pre>";print_r($add);echo"</pre>";
?>
    <table border="1">
        <tr>
            <td>题库id</td>
            <td>题库名称</td>
            <td>题库添加人</td>
            <td>题库添加时间</td>
            <td>操作</td>
        </tr>
   <?php foreach($add as $k => $v){ ?>
            <tr>
                <td><?php echo $v[0]; ?></td>
                <td><?php echo $v[1]; ?></td>
                <td><?php echo $v[2]; ?></td>
                <td><?php echo date("Y-m-d H:i:s",$v[3]); ?></td>
                <td><a href="del.php?id=<?php echo $v[0];?>">删除</td>
                <td><a href="del.php?per<?php echo $v[0] ?>">修改</a></td>
            </tr>
   <?php } ?>
    </table>

