<?php
    // 连接数据库
    $host = "127.0.0.1";
    $db = "phplogin";
    $user = "root";
    $pass = "200238root";
    $dbh = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
    echo "<pre>";print_r($_POST);echo"</pre>";
    // 处理变量
    $uname = trim($_POST['uname']);
    $eamil = trim($_POST['uemail']);
    $udel = trim($_POST['udel']);
    $uage = trim($_POST['uage']);
    $uaddress = trim($_POST['uaddress']);   // 地址
    $pass1 = trim($_POST['upass1']);
    $pass2 = trim($_POST['upass2']);
    $utime = time();
    if($pass1==$pass2){
        $pass_a = password_hash($pass1,PASSWORD_BCRYPT);
    }else{
        die("密码不一致");
    }
    $sql = "insert into reg(reg_name,reg_eamil,reg_del,reg_age,reg_uadd,reg_pass1,reg_time)
values (?,?,?,?,?,?,?)";

    // 预处理
    $stmt = $dbh->prepare($sql);
    // 绑定参数
    $stmt->bindParam(1,$uname);
    $stmt->bindParam(2,$eamil);
    $stmt->bindParam(3,$udel);
    $stmt->bindParam(4,$uage);
    $stmt->bindParam(5,$uaddress);
    $stmt->bindParam(6,$pass_a);
    $stmt->bindParam(7,$utime);

    $stmt->execute();   // 执行
    // 查看sql执行受影响的行数
    $affect_rows = $stmt->rowCount();
    echo "受影响的行数".$affect_rows;
    if ($affect_rows>0){
        echo "执行成功";echo "<hr>";
    }else{
        echo "注册失败";echo "<hr>";
    }

