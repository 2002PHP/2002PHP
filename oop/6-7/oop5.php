<?php
    // 定义一个类 类是由 属性 (变量) 和方法 (函数) 组成
    class Cat {
        // 构造函数
        public function __construct()
        {
            echo "构造函数";
        }
        // 析构函数 对象销毁时自动调用
        public function __destruct()
        {
            echo "析构函数";
        }
    }
    $cat1 = new Cat();
    echo "<hr>";