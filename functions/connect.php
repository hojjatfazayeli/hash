<?php

function connect_db(){
    $server="mysql:host=localhost;dbname=hash;charset=utf8";
    $user_db="root";
    $pass_db="";
    try {
        $pdo= new PDO($server,$user_db,$pass_db);
        //echo "اتصال به دیتابیس با موفقیت انجام شد"."<br>";
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
    return $pdo;
}

?>





