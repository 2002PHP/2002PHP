<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});
// 当前用户访问xxx.com/hello/xxx , 找到 index控制器 hello方法
Route::get('hello/:name', 'index/hello');
Route::get('login','index/login');
Route::get('user/reg','index/reg');
Route::get('list/goodsList','index/goodsList');
Route::get('listL','index/listL');
// 查询年龄大于20的学生
Route::get('sex/stu_sex','index/stu_sex');
// 年龄小于18的学生信息(只显示10条 倒序)
Route::get('age18','index/age18');
// 查询性别为女的学生信息
Route::get('sex_girl','index/sex_girl');
//// 查询男同学的信息
Route::get('sex_man','index/sex_man');
// 查询综合积分在80分以上的同学的信息
Route::get('score_80','index/score_80');
// 查询综合积分小于59的学生的姓名和年龄
Route::get('score50','index/score50');
// 查询年龄在18-25随之间的学生信息
Route::get('age_and','index/age_and');
// 查询女同学 年龄小于20的学生的姓名 年龄
Route::get('age_less','index/age_less');
// 查询id为5的一条数据
Route::get('id','index/id');
// 查询综合积分小于70的
Route::get('score70','index/score70');
Route::get('insert','index/insert');
// student
Route::get('test/addStu','test/addStu');
Route::get('test/hello','test/hello');
Route::get('test/add100','test/add100');
// 用户注册
Route::get('us/reg','user/reg'); // 注册
Route::post('us/reg','user/reg2');  // 注册
Route::get('us/login','user/login');// 登录
Route::post('us/login','user/loginDb');// 登录
Route::get('us/center','user/center'); // 用户中心
Route::get('us/mov/:id','user/mov');    // 用户中心删除
Route::get('goods/:id','goods/goods');
Route::get('us/logout','user/logout');  // 退出登录清除session
Route::get('us/del','user/del');
Route::get('book/book','book/book'); // 图书
Route::post('book/book','book/book2'); // 图书逻辑
Route::get('book/book3','book/book3'); // 图书列表
Route::get('book/del/:id','book/del'); // 图书删除

Route::get('mov/movie','user/movie');
Route::get('mov/movieScore','user/movieScore'); //电影评分逻辑
Route::post('mov/movs','user/movs'); // 电影列表
Route::get('prize/prize','user/prize');// 抽奖
Route::get('cust/cust','user/cust'); // 定坐
Route::post('cust/custs','user/custs'); // 定坐
Route::post('cust/custsdelete','user/custsdelete'); // 取消订单

Route::get('info/info','Info/info'); // 统计
Route::get('text/text1','text/text1');
Route::post('text/text2','text/text2');
Route::get('order/list','Order/olist'); // 列表
return [

];
