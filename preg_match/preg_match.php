<?php
    echo'<pre>';print_r($_POST);echo'</pre>'; 
    // 接受POST传参
    if(empty($_POST)){
        die("没有提交数据");
    }
    $user_info=[];
    // 判断字段不能为空
    foreach($_POST as $k=>$v){
        $input = trim($v);// 去空格 // 对用户输入的进行二次处理
        if(empty($input)){
            die($k. "字段不能为空");
        }

        // 用户信息保存在新数组中
        $user_info[$k] = $input;
    }
    echo"<hr>";
    echo"<pre>";print_r($user_info);echo"</pre>";

    // y验证用户名是否符合用户名规则 大小写英文字母不小于 6
    $patten = "/^[a-zA-Z]{6,}$/";
    if(preg_match($patten,$user_info['u_name'])){
        die('用户名不符合规则');
    }
    // 验证手机号
    $patten ="/^1[356789]\d{9}$/";
    if(!preg_match($patten,$user_info["u_tel"])){
        die('手机号不符合规则');
    }
    // 验证密码
    $patten = "/^\w{6,9}$/";
    if(!preg_match($patten,$user_info["u_pass"])){
        die('手机号不符合规则');
    }
    // 验证确认密码
    if($user_info["u_pass"]!==$user_info["u_pass1"]){
        die('密码与确认密码不一致');
    }
    // 验证Eamil邮箱
    if(!filter_var($user_info["u_email"],FILTER_VALIDATE_EMAIL)){
        die("Email不符合规则");
    }