<?php
    // 定义一个类  类是由 属性 (变量) 和方法 (函数) 组成
    // 修饰符 public 公共的
    class cat{
        // 颜色
        public $color = "white";  // 成员属性 (变量)

        // 定义一个 行为 (方法) 函数
        public function climbTree() // 成员方法 (函数)
        {
            echo "爬树";
        }

        public function catchMouse()
        {
            echo "抓老鼠";
        }
}
        // 将类实例化
        $cat1 = new cat();          // 将类实例化 得到一个对象
        var_dump($cat1);
        $c = $cat1->color;      // -> 访问成员变量
        echo '<hr>';
        $cat1->climbTree();   // -> 访问成员方法
        echo '<hr>';
        $cat1->catchMouse();