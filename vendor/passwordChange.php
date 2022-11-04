<?php
    session_start();
    //require_once 'connect.php';
    require_once 'connect_view.php';
    require_once 'connect_insert.php';
    require_once 'connect_update.php';

    $login = $_SESSION['user']['login'];
    $oldpassword = $_POST["oldpassword"];
    $newpassword = $_POST["newpassword"];
    $oldpassword1 = ord($login."") . md5($oldpassword);
    $newpassword1 = ord($login."") . md5($newpassword);

    $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login . "' AND `password`='$oldpassword1' ");
    
    if(mysqli_num_rows($check_user) > 0){ 
        $time=time();
        $today = date("Y-m-d H:i:s",$time);
        $typee = "Change password";
        $ip = $_SERVER['REMOTE_ADDR'];
        mysqli_query($connect_insert, "INSERT INTO `logs`(`id`, `login`, `time`, `type`, `ip`) VALUES (NULL,'" . addslashes($login) . "', '$today', '$typee', '$ip')");

        $neww = mysqli_query($connect_update,"UPDATE `user` SET `password` = '$newpassword1' WHERE `login`='$login'");
        $_SESSION['message'] = 'Password change !';
        header('Location: ../profile.php');
    }
    else{
        $_SESSION['message'] = 'Wrong old password!';
        header('Location: ../profile.php');
    }

    