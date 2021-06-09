<?php
    class human{
        // 长相
        public $looks = "帅气迷人";
        // 定义一个 方法
        public function movie(){
            echo "在电影院";
        }
        public function film(){
            echo "看电影";
        }
    }
    // 将一个类实例化 得到一个对像
    $film1 = new human();
    var_dump($film1);echo '<hr>';
    // 使用对象操作符访问
    $film1->movie();echo '<hr>';
    $film1->film();
