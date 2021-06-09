<?php
    // 类的继承性
    class Person{
        public $age = 38;
        public $sex = "男";
        public $height = 180;

        public function eat(){
            echo "热爱学习";
        }
        public function cry(){
            echo "坚持不屑";
        }
    }
    // 定义一个类 继承另一个类
    // 继承的值可以覆盖父的值
    class white extends Person{
        public $jh = "结婚";

        public function cry()
        {
            echo "要结婚了";
        }
    }
    $p1 = new white();
    echo "年龄 :" .$p1->age;echo "<hr>";
    echo "性别 :" .$p1->sex;echo "<hr>";
    echo "身高 :" .$p1->height;echo "<hr>";
    $p1->cry();