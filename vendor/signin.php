<?php
    ///////////////////////////
    session_start();
    //session_regenerate_id(true); 
    //require_once 'connect.php'; 
    require_once 'connect_view.php';
    require_once 'connect_insert.php';

    if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
        
        $secret = '6LcoNVUiAAAAAB0IBy3WfL3MrRMW3z_t8g7pPDzy';
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
        $arr = json_decode($rsp, TRUE);
        if ($arr['success']) {

            $login= mysqli_escape_string($connect_view, $_POST['login']);
            $password= mysqli_escape_string($connect_view, ord($login."") . md5($_POST['password']));
            
            $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE (`login`='" . $login . "' AND `password`='$password') OR (`email`='" . $login . "' AND `password`='$password') ");
            $user = mysqli_fetch_assoc($check_user);
            if($user['status']=="ban"){
                $_SESSION['message'] = 'You Banned ! .-.';
                header('Location: ../index.php');
            }else{
            if(mysqli_num_rows($check_user) > 0){ //Количество найденных
                
               
                
                $check_user2 = mysqli_query($connect_view, "SELECT * FROM `logs` WHERE `login`='" . $login."' OR `email`='" . $login . "'");
                $user2 = mysqli_fetch_array($check_user2);
                
                
                
        
                $_SESSION['user']=[
                    "id" => $user['id'],
                    "login" => $user['login'],
                    "rights" => $user['rights'],
                    "session_log" => $user['session_log'],
                    "email" => $user['email'],
                    "session_log" => $user['session_log']
            ];
                $time=time();
                $today = date("Y-m-d H:i:s",$time);
                $time=time();
    
       
    
                $typee = "authorization";
                $ip = $_SERVER['REMOTE_ADDR'];
                mysqli_query($connect_insert, "INSERT INTO `logs`(`id`, `login`, `time`, `type`, `ip`) VALUES (NULL,'" . addslashes($login) . "', '$today', '$typee', '$ip')");
                
                header('Location: ../profile.php');
            } else{
                $_SESSION['message'] = 'Wrong login or password';
                header('Location: ../index.php');
            }
            }
        }
      }else{
        $_SESSION['message'] = 'Captha !';
                header('Location: ../index.php');
      }
      

    