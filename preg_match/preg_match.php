<?php
    echo'<pre>';print_r($_POST);echo'</pre>';

    // 获取用户名
    $user_nmae = $_POST["u_name"];
    // 验证用户名是否符合用户名规则
    $patten = "/^\w{5,10}$/";
    if(!preg_match($patten,$user_nmae)){
        echo "用户名不符合规则";
        echo '<hr>';
    }else{
        echo "用户名提交成功";
        echo '<hr>';
    }
    // 获取密码
    $user_pass1 = $_POST["u_pass"];
    // 验证密码是否符合密码规则
    $patten1 = "/^\w{6,}$/i";
    if(!preg_match($patten1,$user_pass1)){
        echo "密码不符合规则";
        echo '<hr>';
    }else{
        echo "密码提交成功";
        echo '<hr>';
    }

    // 确认密码
    $user_pass2 = $_POST["u_pass1"];
    if($user_pass1==$user_pass2){
        echo "密码提交成功";
        echo '<hr>';
    }else{
        echo "密码错误";
        echo '<hr>';
    }
    // Email 邮箱
    $user_email = $_POST["u_email"];
    // 验证Email是否符合规则
    $patten2 = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    if(!preg_match($patten2,$user_email)){
        echo "Email格式错误";
        echo '<hr>';
    }else{
        echo "Email格式正确";
        echo '<hr>';
    }