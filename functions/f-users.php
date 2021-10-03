<?php
session_start();
include_once 'connect.php';

function register_user($info){
    $fullname = 'Bita Sarfarazi';
    $username = $info['username'];
    $password = $info['password'];
    $result = chk_username($username);
    if ($result){
        $op = 'registred';
        header("location: ../register.php?op={$op}");
    }
    else{
       $lengh_pass =  strlen($password);
       if ($lengh_pass >=8){
           if (strpos($password,'A') || strpos($password,'B') || strpos($password, 'C')){
               $new_password = md5($password);
               $pdo = connect_db();
               $query = $pdo->prepare("INSERT INTO users_tbl (fullname,username,password) VALUE ('$fullname' , '$username' , '$new_password')");
               $query->execute();
           }
       }
    }
}

function login_user($username , $password){
    $result = chk_username($username);
    if ($result){
        $new_password = md5($password);
        if ($result->password == $new_password){
            $_SESSION['login_hash'];
            $res_login = true;
        }
        $res_login = false;
    }
    return $res_login;
}
function chk_username($username){
    $pdo = connect_db();
    $query = $pdo->prepare("SELECT * FROM users_tbl WHERE username = '$username'");
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    return $result;
}
?>