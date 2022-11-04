<?php
    session_start();
    require_once 'connect_view.php';
    require_once 'connect_update.php';
    require_once 'connect.php';

    

    $login = $_POST['Login'];
    $todo = $_POST['todo'];

    $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login . "' OR `email`='" . $login . "'");
    $user = mysqli_fetch_assoc($check_user);
    if(mysqli_num_rows($check_user) <= 0){
                $_SESSION['message'] = 'User is not find =/';
                header('Location: ../profile.php');
    }else{

        if($todo=="Block"){
            $neww = mysqli_query($connect,"UPDATE `user` SET `status` = 'ban' WHERE `login`='$login'");
            $_SESSION['message1'] = $login .' banned.';
            header('Location: ../profile.php');
        }
        if($todo=="Unblock"){
            $neww = mysqli_query($connect,"UPDATE `user` SET `status` = null WHERE `login`='$login'");
            $_SESSION['message1'] = $login .' unbanned.';
            header('Location: ../profile.php');
        }
        if($todo=="Moder"){
            $neww = mysqli_query($connect,"UPDATE `user` SET `rights` = 'moder' WHERE `login`='$login'");
            $_SESSION['message1'] = $login .' moder now.';
            header('Location: ../profile.php');
        }
        if($todo=="Unmoder"){
            $neww = mysqli_query($connect,"UPDATE `user` SET `rights` = 'user' WHERE `login`='$login'");
            $_SESSION['message1'] = $login .' not moder.';
            header('Location: ../profile.php');
        }
    
    }

    