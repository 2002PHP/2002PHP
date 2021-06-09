<?php
    $host = "127.0.0.1";
    $user = "root";
    $pass = "200238root";
    $db = "phplogin";
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

//    $sql = "select * from"