<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\index\model\Order as OrderModel;
class Order extends Controller
{
    public function olist()
    {
        $list = Db::table('p_order_info')
            ->field('order_id,user_id,goods_amount,add_time')
            ->order('order_id','desc')->limit(10)
            ->select();
    echo "<pre>";print_r($list);echo"</pre>";
    }
}
