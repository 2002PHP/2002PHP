<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
class Book extends Controller
{
    /*
     * 图书
     */
    public function book()
    {
        // 显示视图
        return $this->fetch();  // 显示模板
    }
    /*
     * 图书逻辑
     */
    public function book2()
    {
        echo "<pre>";print_r($_POST);echo"</pre>";
        $name = trim($_POST['uname']);
        $price = trim($_POST['price']);
        $book_num = trim($_POST['amount']);
        $sale = trim($_POST['shi']);
        $date = [
            'book_name' => $name, 'book_price' => $price,
            'book_num'  => $book_num, 'is_sale' => $sale];
        $arr = Db::table('book')->insert($date);
        if ($arr){
            echo "成功";
            return redirect('book/book3');
        }else{
            echo "失败";
        }
    }
    /*
     * 图书列表
     */
    public function book3()
    {
        $de = Db::table('book')->select();
        $this->assign('book3',$de);
        return $this->fetch();
    }
    /*
     * 删除
     */
    public function del($id)
    {
        $del = Db::table('book')->field('')->where('book_id',$id)->delete();
        if ($del){
            return redirect('book/book3');
        }else{
            echo "失败";
        }
    }

}