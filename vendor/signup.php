<?php
    session_start();
    //require_once 'connect.php'; 
    require_once 'connect_view.php';
    require_once 'connect_insert.php';
    
    
    $randomFloat = rand(0, 200) / 100;
    sleep($randomFloat);

    $login = $_POST["login"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];
    $email = $_POST['email'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $password = md5($password);
    $password_repeat = md5($password_repeat);
    $salt_first = ord($login.""); 
    
    $check_email = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `email`='" . $email . "'");
    $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login."'" );

    if((mysqli_num_rows($check_user) > 0) && (mysqli_num_rows($check_email) > 0)){
        $_SESSION['message'] = 'Login or Email already in use';
        header('Location: ../register.php');
    }
    else if(mysqli_num_rows($check_email) > 0){
        $_SESSION['message'] = 'Login or Email already in use';
        header('Location: ../register.php');
    }
    else{
        if(!empty($password) && !empty($login))
        {
            if($password === $password_repeat){
        
                if( strlen($login)<16){
                    
                    $time=time();
                    $today = date("Y-m-d H:i:s",$time);
                    $typee = "registration";
                    $zapros = mysqli_query($connect_insert, "INSERT INTO `logs`(`id`, `login`, `time`, `email`, `type`) VALUES (NULL,'" . addslashes($login) . "', '$today', '". addslashes($email) . "', '$typee')");
                    if(!$zapros){ // запрос завершился ошибкой
                        $_SESSION['message']="Такой логин уже существует !";
                        header('Location: ../register.php');
                    }
                    $_SESSION['message']="Регистрация успешно завершена !".mysqli_num_rows($check_user);

                    $password = $salt_first . $password;


                    mysqli_query($connect_insert, "INSERT INTO `user`(`id`, `login`, `password`, `email`, `question`, `answer`, `rights`) VALUES (NULL,'" . addslashes($login) . "','$password', '". addslashes($email) . "','".md5($question)."','".md5($answer)."','user' )");
                    header('Location: ../index.php');
                }
                else{
                    $SESSION['message']='Слишком длинный логин';
                    header('Location: ../register.php');
                }
             
            } 
            else{
                $_SESSION['message']='Пароли не совпадают';
                header('Location: ../register.php');
            }
        }
        else{
            $_SESSION['message']='Заполните все поля.';
            header('Location: ../register.php');
        }
        
    }

    

    
    
