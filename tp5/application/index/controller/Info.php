<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Info extends Controller
{
   public function info()
   {
//       return $this->fetch();
       // 消费最多的前10个用户
       $list=Db::table('p_order_info')->alias('b')
           ->field('a.user_id,a.user_name,a.reg_time,sum(b.goods_amount) as total')
           ->join('p_users a','a.user_id=b.user_id')
           ->group('b.user_id')
           ->order('total','desc')
           ->limit(10)->select();
       // 订单最多的前10个用户信息
       $list= Db::table('p_order_info')->alias('b')
            ->field('a.user_id,a.user_name,a.reg_time,count(b.user_id) as total')
            ->join('p_users a','a.user_id=b.user_id')
            ->group('b.user_id')
            ->order('total','desc')
            ->limit(10)->select();
        echo "<pre>";print_r($list);echo"</pre>";
        // 卖的最多的钱10个商品
      /*$add= Db::table('p_goods')
           ->field('goods_id,goods_name,sum(click_count)')
           ->group('goods_id,goods_name,click_count')
           ->order(['click_count'=>'desc'])
           ->limit(10)
           ->select(); */

      /*$add= Db::table('p_order_info')
           ->field('user_id,avg(order_status)')
           ->group('user_id,order_status')->select();
       echo "<pre>";print_r($add);echo"</pre>"; */
   }
}