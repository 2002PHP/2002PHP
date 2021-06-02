<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
        <tr>
            <td>学生姓名</td>
            <td>年龄</td>
            <td>学生住址</td>
        </tr>
        <td>
            <td></td>
            <td></td>
            <td></td>
        </td>
    </table>
</body>
</html>

<?php
    echo'<pre>';print_r($_POST);echo'</pre>';
    
    $host ="127.0.0.1";
    $root = "root";
    $pass = "200238root";
    $db = "root_cjg";

    $link = new mysqli($host,$root,$pass,$db);  // ;链接数据库
    // echo'<pre>';print_r($link);echo'</pre>';

    $uname = trim($_POST['uname']);  // 处理数据库
    $uage = trim($_POST['uage']);
    $uzz = trim($_POST['uzz']);
    if($uage>18){
        echo"已成年";
    }else{
        echo"未成年";
    }
    // 将学生信息展示到表格

    $sql = "insert into tab(username,age,dz) 
values ('{$uname}','{$uage}','{$uzz}')";
    echo'<hr>';
    echo'<pre>';print_r($sql);echo'</pre>';

    $stmt = mysqli_prepare($link,$sql);
    $carry = mysqli_stmt_execute($stmt);
    if($carry){
        echo "注册成功";
    }else{
        echo "注册失败";
    }
