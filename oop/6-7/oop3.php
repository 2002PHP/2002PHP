<?php
    // 定义一个类 类是由 属性 (变量) 和 方法 (函数)组成
    class cat{
        public $color = "red";
        protected $name = "猫🐱";
        private $sex = "Male";
        private $weight;

        // 构造函数
        public function __construct($name,$sex,$weight){
            echo "name:".$name;echo '<br>';
            echo "sex:".$sex;echo '<br>';
            echo "weight:".$weight;echo '<br>';
        }
    }
    $cat1 = new cat("大菊猫","Male","5kg");
    echo "<hr>";
    $cat2 = new cat("小菊猫","Male","3kg");