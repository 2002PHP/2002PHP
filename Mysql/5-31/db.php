<?php
        // 使用mysqli连接 MySQL
        $host = "127.0.0.1";        // Mysql的主机地址
        $user = 'root';             //数据库的用户名
        $upass = '200238root';        // 数据库密码
        $db = "root_cjg";            //使用的数据库

        // 链接数据库
        $link = new mysqli($host,$user,$upass,$db);
