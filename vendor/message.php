<?php
    session_start();
    require_once 'connect_insert.php'; 
    $login = $_SESSION['user']['login'];
    $message = htmlspecialchars($_POST['message']);
    $rights = $_SESSION['user']['rights'];
    
    $time=time();
    $today = date("Y-m-d H:i:s",$time);
    
    if($_SESSION['user']){
        mysqli_query($connect_insert, "INSERT INTO `forum`(`id`, `message`, `user`, `time`, `rights`) VALUES (NULL,'" . addslashes($message) . "','$login', '". $today . "','".$rights."')");
        header("Location: ../forum.php");
    }
    else{ header("Location:../forum.php" );}
