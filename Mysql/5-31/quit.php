<?php
    session_start();    // 开启会话
//    销毁cookie
    setcookie('userid','',time()-1);
//    unset($GLOBALS['username']); // unset销毁session
    echo "退出登录";
    header('Refresh:0;url=login.html');