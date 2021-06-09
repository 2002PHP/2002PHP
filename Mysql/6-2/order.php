<?php
    include "../5-31/db.php"; // 链接数据库
    // 1. 查找表中 order_sn  为 2020042321284 或 2020042369891 的记录;
    /* $sql = "select * from p_order_info where order_sn= 2020042321284 or order_sn= 2020042369891";
        $taet = mysqli_query($link,$sql);
        $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
        echo "<pre>";print_r($carry);echo"</pre>"; */
//    2.查找  order_info 表中 user_id 为 1116 的订单记录，按支付时间倒序排序 。
        /*$sql = "select * from p_order_info where user_id=1116 ORDER BY pay_time DESC";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
    //3.查找 order_goods 表中 商品名（goods_name 字段） 中包含 WDR5620 的记录
       /* $sql = "select goods_name from p_order_goods where goods_name like `%WDR5620%`";
        $taet = mysqli_query($link,$sql);
        $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
        echo "<pre>";print_r($carry);echo"</pre>"; */
    // 4. 统计 订单表 (order_info) 中有多少用户 count + (distinct 将重复的排查掉)
        /* $sql = "select count(distinct user_id) from p_order_info;";
        $taet = mysqli_query($link,$sql);
        $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
        echo "<pre>";print_r($carry);echo"</pre>"; */
        // 5. 统计 user_id 为 1867 的用户订单总金额
       /*$sql = "select sum(money_paid) from p_order_info";
        $taet = mysqli_query($link,$sql);
        $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
        echo "<pre>";print_r($carry);echo"</pre>"; */
       // 6. 统计所有的订单总金额 (按 user_id 分组)
        /*$sql = "select sum(money_paid) from p_order_info";
        $taet = mysqli_query($link,$sql);
        $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
        echo "<pre>";print_r($carry);echo"</pre>"; **/
        // 7.统计所有用户中支付金额最多的前10人
            /*$sql = "select money_paid from p_order_info where money_paid order by money_paid desc limit 10 ";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //8统计订单表（order_info）中支付金额最高的前10个用户，及这10个用户的订单总金额(统计 order_info.money_paid)
           /* $sql = "select count(user_id),sum(money_paid),sum(order_amount) from p_order_info where money_paid order by money_paid desc  limit 10 ";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //9 查找 order_info 表中 money_paid 大于等于 5000 并且 小于 等于 6000 的记录（两种写法）
        //> 大于 小于
            /*$sql = "select money_paid from p_order_info where money_paid>=5000 and money_paid<=6000";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
           /* $sql = "select money_paid from p_order_info where money_paid between 5000 and 6000";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //10 使用子查询查找 order_info 表中 money_paid 最大的记录（不一定是一条记录）
           /* $sql = "select money_paid from p_order_info where money_paid order by money_paid desc ";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //11 使用子查询查找 order_info 表中 money_paid 最小的记录（不一定是一条记录）
            /*$sql = "select money_paid from p_order_info where money_paid order by money_paid limit 1";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //12  查找 order_info 表记录,按 money_paid 降序排序，取20条
           /* $sql = "select money_paid from p_order_info where money_paid order by money_paid desc limit 20";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //13 统计 order_info 表有多少条记录？
            /*$sql = "select count(user_id) from p_order_info;";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //14 统计 order_info 表中订单均价？
            /*$sql = "select avg(money_paid) from p_order_info";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //15 查找 order_info 表中共有多少个不同的 user_id
           /* $sql = "select user_id, count(user_id) from p_order_info group by user_id";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //16 统计 order_info 表中 money_paid（订单金额） 总和
           /* $sql = "select sum(money_paid) from p_order_info ";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //17 统计 order_info 表中 money_paid 的平均值
            /*$sql = "select avg(money_paid) from p_order_info";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //18 检索 order_info 表中 add_time(字段类型为时间戳) 为 2013 年 6 月的记录
        //使用函数：FROM_UNIXTIME(),YEAR(),MONTH(),DAY()
        //FROM_UNIXTIME(1402848000);//函数参数为 unix时间戳，运算结果  Y-M-D H:i:S
        //YEAR(),MONTH(),DAY()	// 函数参数格式 “2014-06-15 02:32:39”
           /*$sql = "select YEAR(add_time),MONTH(add_time),DAY(add_time) from p_order_info where FROM_UNIXTIME(1402848000) YEAR(add_time),MONTH(add_time),DAY(add_time)";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
        //19、在订单表（order_info）中查找 最新的 10条记录及下单的用户信息。（需要联表查询 order_info 与 users 表）
        //	    结果需包含以下字段
        //		    users.user_name： 用户名
        //		    users.reg_time: 注册时间（查询结果 以年月日显示 'xxxx-xx-xx xx:xx:xx'）
        //	    要求：两种方式查询
        //        >  where
        //		    >  表1 inner join 表2 on 条件
                //order_info.order_id： 订单号
           /* $sql = "select order_id from p_order_info where order_id order by order_id desc limit 10";
            $taet = mysqli_query($link,$sql);
            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
            echo "<pre>";print_r($carry);echo"</pre>"; */
                //order_info.add_time: 下单时间
//            $sql = "select add_time from p_order_info where add_time order by add_time desc limit 10";
//            $taet = mysqli_query($link,$sql);
//            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
//            echo "<pre>";print_r($carry);echo"</pre>";
//		        //order_info.money_paid: 订单金额
//            $sql = "select money_paid from p_order_info where money_paid order by money_paid limit 10";
//            $taet = mysqli_query($link,$sql);
//            $carry = mysqli_fetch_all($taet,MYSQLI_ASSOC);
//            echo "<pre>";print_r($carry);echo"</pre>";
		        // users.user_id: 用户id





