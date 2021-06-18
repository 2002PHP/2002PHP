<?php

namespace app\index\model;

use think\Model;
class User extends Model
{
    //绑定数据库中的表
    protected $table = "p_users";
    // 绑定表中主键
    protected $bk = "user_id";
}
