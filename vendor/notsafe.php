<?php
    session_start();
    require_once 'connect_view.php'; 
    

    $login = $_GET["login"];
    $password = ord($login."") . md5($_GET["password"]);
    $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login . "' AND `password`='$password' ");
                                        //'INSERT INTO `user` (login, password) VALUES ('HaCkEr', 'foo')
    
                                        //INSERT INTO `user`( `login`, `password`) VALUES (123,321);SELECT * FROM `user` WHERE `password`='" . $password . "' AND `login`='$login
    if(mysqli_num_rows($check_user) > 0){ //Количество найденных

        $user = mysqli_fetch_assoc($check_user); //Массив
        $_SESSION['user']=[
            "id" => $user['id'],
            "login" => $user['login'],
            "session_log" => $user['session_log']

    ];
        
        header('Location: ../profile.php');
    } else{
        $_SESSION['message'] = 'Wrong login or password';
        header('Location: ../authnotsafe.php');
    }