<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>列表</title>
</head>
<body>
    <?php
        $list = [
            '蔡景贵',
            '李伟业',
            '张三',
            '李四'
        ];
    ?>
    <ul>
        <li>王叔</li>
        <?php
            $length = count($list); // count()
            for($i=0;$i<$length;$i++){
                // echo "<li>".$list[$i]."</li>";
            }
        ?>

        <?php
            foreach($list as $k=>$v){
                echo "<li>===".$k.$v."====</li>";
            }
        ?>
    </ul>
</body>
</html>