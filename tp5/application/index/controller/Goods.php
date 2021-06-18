<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

Class Goods extends Controller
{
    /*
     * 商品详情信息
     */
    public function goods($id=0)
    {
        echo "商品id ".$id;
       $goods= Db::table('p_goods')
            ->field('goods_id,goods_name,shop_price')
            ->where('goods_id',$id)->find();
        if ($goods){
            $this->assign('name',$goods['goods_name']);
            $this->assign('price',$goods['shop_price']);
            return $this->fetch();
        }else{
            echo "没有这个用户";
        }
    }
}