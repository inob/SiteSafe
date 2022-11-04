<?php
    session_start();
    if(!$_SESSION['user']){
        header('Location: index.php');
    }

    require_once 'vendor/connect.php';

    $time=time();
    $today = date("Y-m-d H:i:s",$time);
    $stri = md5("mem:" . $today);

    $login=$_SESSION['user']['login'];
    $password=$_SESSION['user']['password'];


    mysqli_query($connect, "UPDATE `user` SET `session_log`='$stri' WHERE `login`='" . $login . "'");

    $_SESSION['user']["session_log"] = $stri;
    header('Location: profile.php');

    

    