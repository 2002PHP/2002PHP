<?php
    if ($_POST) {
        $host = "127.0.0.1";        // Mysql的主机地址
        $user = 'root';             //数据库的用户名
        $upass = '200238root';        // 数据库密码
        $db = "phplogin";            //使用的数据库
        // 链接数据库
        $link = new mysqli($host,$user,$upass,$db);
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        $name = trim($_POST['uname']);
        $jiage = trim($_POST['jiage']);
        $dan = trim($_POST['dan']);
        $teacher = trim($_POST['teacher']);

        $sql = "insert into course(c_name,c_price,c_ser,c_teacher)
        values ('{$name}','{$jiage}','{$dan}','{$teacher}')";
        echo "<pre>";print_r($sql);echo"</pre>";
        $query = mysqli_prepare($link,$sql);
//        var_dump($query);die();
        $arr = mysqli_stmt_execute($query);
        if ($arr) {
            echo "成功";
        } else {
            echo "失败";
        }
        $sql_a = "select * from course";
        $qu = mysqli_query($link,$sql_a);
        $add = mysqli_fetch_all($qu);
        echo "<pre>";print_r($add);echo"</pre>";
    }
?>
    <table border="1">
        <tr>
            <td>课程名称</td>
            <td>课程价格</td>
            <td>是否连载</td>
            <td>该课程讲师</td>
        </tr>
        <?php foreach ($add as $k=>$v){ ?>
                <tr>
                    <td><?php echo $v[1] ?></td>
                    <td><?php echo $v[2] ?></td>
                    <td><?php if($v[3]=='是'){
                            echo "连载中";
                        }else{
                            echo "完成";
                        } ?></td>
                    <td><?php echo $v[4] ?></td>
                </tr>
        <?php } ?>
    </table>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<h1>课程管理</h1>
<form action="./reg.php" method="post">
    <table border="1">
        <tr>
            <td>课程名称</td>
            <td><input type="text" name="uname"></td>
        </tr>
        <tr>
            <td>课程价格</td>
            <td><input type="text" name="jiage"></td>
        </tr>
        <tr>
            <td>是否连载</td>
            <td>
                <input type="radio" name="dan" value="是">是
                <input type="radio" name="dan" value="否">否
            </td>
        </tr>
        <tr>
            <td>该课程讲师</td>
            <td>
                <input type="text" name="teacher">
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="添加"></td>
        </tr>
    </table>
</form>
</body>
</html>
