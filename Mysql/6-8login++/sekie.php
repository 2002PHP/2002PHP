<?php
    // 个人中心页面
    session_start(); // 开启会话
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "phplogin";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // 判断用户是否已登录
//    echo "<pre>";print_r($_SESSION);echo"</pre>";
//    die();
    if (isset($_SESSION['reg']['reg_name'])){
        $login_name= $_SESSION['reg']['reg_name'];
        echo "欢迎回来 {$login_name}";
    }else{
        echo "请先登录两秒后转跳到登录页面";
        header('Refresh:2;url=login.html');
    }
    // 将用户信息展示到页面
    $uid = $_COOKIE['reg_id'];
    //sql
    $sql = "select * from login_history ";
    // 预处理
    $stmt = $dbh->prepare($sql);
    // 绑定参数
    $stmt->bindParam(1,$uid);
    $res = $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<pre>";print_r($row);echo"</pre>";
    ?>
    <table border="1">
        <tr>
            <td>uid</td>
            <td>上次登录时间</td>
            <td>ip</td>
            <td>ua</td>
            <td>操作</td>
        </tr>
        <?php foreach ($row as $k => $v){ ?>
                <tr>
                    <td><?php echo $v['login_id']; ?></td>
                    <td><?php echo $v['reg_id']; ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$v['login_time']); ?></td>
                    <td><?php echo $v['login_ip']; ?></td>
                    <td><?php echo $v['login_ua'];  ?></td>
                    <td><a href="./delete.php?id=<?php echo $v['login_id'] ?>">删除</a></td>
                </tr>
        <?php } ?>
    </table>
