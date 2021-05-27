<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
<?php
    $f = "./text";
    echo file_get_contents($f);
    
    // if(file_get_contents($f)){
    //     $f+1;
    // }
    ?>
</body>
</html>