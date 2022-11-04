<?php
    session_start();
    require_once 'connect.php';
    require_once 'connect_view.php';
    require_once 'connect_insert.php';
    require_once 'connect_update.php';
    
    
    $login = $_SESSION['kuku']['login'];
    $password1 = $_SESSION['kuku']['password'];
    $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login . "' OR `email`='" . $login  . "' ");
    $user = mysqli_fetch_assoc($check_user);

    
    $TrueAnswer = $user['answer'];
    $UserAnswer = $_POST['answer'];

    
    if($TrueAnswer == md5($UserAnswer)){
            $time=time();
            $today = date("Y-m-d H:i:s",$time);
            $typee = "Change password";
            $ip = $_SERVER['REMOTE_ADDR'];
            mysqli_query($connect_insert, "INSERT INTO `logs`(`id`, `login`, `time`, `type`, `ip`) VALUES (NULL,'" . addslashes($login) . "', '$today', '$typee', '$ip')");
            
            $newpassword1 = ord($login."") . md5($password1);

            $neww = mysqli_query($connect,"UPDATE `user` SET `password` = '$newpassword1' WHERE `login`='$login' OR `email`='$login'");
            $_SESSION['message'] = 'Password change !';
            header('Location: ../index.php');
        }
        else{
            $_SESSION['message'] = 'Wrong answer on your question!';
            header('Location: ../continueForgot.php');
        }
    

    
    
   

    