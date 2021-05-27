<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>表格</title>
</head>
<body>
    <?php
        $list = [
            ["name"=>"蔡景贵","age"=>19,"email"=>"2192058719@qq.com"],
            ['name'=>"李伟业","age"=>17,"email"=>"1571427777@qq.com"],
            ["name"=>"靳润华","age"=>21,"email"=>"1239991234@qq.com"],
            ["name"=>"毕矜兰","age"=>20,"email"=>"1571297264@qq.com"],
        ];
    ?>
    <table border="1">
    <?php
        // foreach($list as $k=>$v){
        //     echo "<tr>
        //             <td>" ."姓名:".$v["name"]."</td>"."<td>"."年龄:".$v["age"]."</td>"."</td>"."<td>"."Email:".$v["email"]."</td>
        //         </tr>";
        // }
        $length= count($list);
        for($i=0; $i<$length; $i++){
            echo "<tr>
                        <td>" ."姓名:".$list[$i]["name"]."</td>"."<td>"."年龄:".$list[$i]["age"]."</td>"."</td>"."<td>"."Email:".$list[$i]["email"]."</td>
                </tr>";
        }
    ?>
    </table>
</body>
</html>