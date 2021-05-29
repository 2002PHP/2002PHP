<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            color: aqua;
        }
    </style>
</head>
<body>
        <?php
            echo "<table>";
            for($i=9;$i>=1;$i--){
                echo '<tr>';
                for($j=9;$j>=$i;$j--){
                    echo '<td style="border:1px solid red">';
                    echo "$i"."*"."$j"."=".$i*$j;
                    echo '</td>';
                }
                echo '</tr>';
            }
        ?>
</body>
</html>