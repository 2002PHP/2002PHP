<?php
    // 个人中心页面
    session_start(); //开启会话
    include "db.php"; // 链接数据库
    //  判断用户是否登录
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        echo "你好 {$username} [{$_COOKIE['userid']}], 欢迎回来";
    }else{
        echo "请先登录两秒后跳转到登录";
        header('Refresh:2;url=login.php');die;
    }
    // 将用户信展示到页面
    $cid = $_COOKIE['userid'];
    // 查询sql语句
    $sql = "select * from login_history where uid={$cid}";
//    //查询
    $arr = mysqli_query($link,$sql);
    $add = mysqli_fetch_all($arr,MYSQLI_ASSOC);
    echo "<pre>";print_r($add);echo"</pre>";die();
    ?>
    <a href="quit.php">
        点击退出
    </a>
    <table border="1">
        <tr>
            <td>uid</td>
            <td>上次登录时间</td>
            <td>ip</td>
            <td>ua</td>
            <td>操作</td>
        </tr>
        <?php foreach($add as $k => $v){?>
                <tr>
                    <td><?php echo $v['uid']; ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$v['login_time']); ?></td>
                    <td><?php echo $v['login_ip']; ?></td>
                    <td><?php echo $v['ua']; ?></td>
                    <td><a href="delete.php?id=<?php echo $v['userid'];?>">删除</a></td>
                </tr>
        <?php } ?>
    </table>
