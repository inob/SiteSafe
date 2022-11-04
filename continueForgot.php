<?php
    session_start();
    require_once 'vendor/connect_view.php';
    if (isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
      $secret = '6LcoNVUiAAAAAB0IBy3WfL3MrRMW3z_t8g7pPDzy';
      $ip = $_SERVER['REMOTE_ADDR'];
      $response = $_POST['g-recaptcha-response'];
      $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
      $arr = json_decode($rsp, TRUE);
      if ($arr['success']) {//Авторизация капчи
        
        $login = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];



        $check_user = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $login."' OR `email`='" . $login . "'");
        $user = mysqli_fetch_assoc($check_user);

        if(mysqli_num_rows($check_user) == 0){
            $_SESSION['message'] = 'Wrong login or Email!';
            header('Location: forgot.php');
        }
        if($password1 != $password2){
          $_SESSION['message'] = 'Пароли не совпадают!';
            header('Location: forgot.php');
        }
          
        $_SESSION['kuku']=["login" => $user['login'],
                          "password" => $password1];
        if($_SESSION['user']){
        header('Location: profile.php');
        }
      }
    }
    else{
      $_SESSION['message'] = 'Captha !';
              header('Location: forgot.php');
    }
    
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <title>Sign in</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="s1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap" rel="stylesheet"> 
    <style></style>
  </head>
  
    <body>
        <form action="vendor/passwordForgot.php" method="post">
                <div class="mb-3 ">
                  <label for="exampleInputText1" class="form-label text-auth"><strong>Change password</strong></label>
                </div>
                <?php
                    if($user['question']==md5("What was the name of your first pet?")){$user['question']="What was the name of your first pet?";}
                    else if($user['question']==md5("What was your first car?")){$user['question']="What was your first car?";}
                    else if($user['question']==md5("What is your grandmother's maiden name?")){$user['question']="What is your grandmother's maiden name?";}
                    else if($user['question']==md5("What was the name of your third grade teacher?")){$user['question']="What was the name of your third grade teacher?";}
                    else if($user['question']==md5("What was the name of your favorite teacher?")){$user['question']="What was the name of your favorite teacher?";}
                    else if($user['question']==md5("What job did you dream of as a child?")){$user['question']="What job did you dream of as a child?";}
                    else if($user['question']==md5("Who was your childhood hero?")){$user['question']="Who was your childhood hero?";}
                    else if($user['question']==md5("What was the first concert you attended?")){$user['question']="What was the first concert you attended?";}
                    else if($user['question']==md5("In which country and city do you want to live in retirement?")){$user['question']="In which country and city do you want to live in retirement?";}
                    else if($user['question']==md5("What is the name of your favorite teacher at the university?")){$user['question']="What is the name of your favorite teacher at the university?";}
                    else if($user['question']==md5("What place did you like to visit as a child?")){$user['question']="What place did you like to visit as a child?";}
                    else if($user['question']==md5("In which country is your dream vacation?")){$user['question']="In which country is your dream vacation?";}

                    echo '<label for="exampleInputText1" class="form-label"><strong>' .$user['question']. '</strong></label>';
                  
                  
                ?>
                <div class="mb-3">
                  <input type="text" name="answer" class="form-control bord" id="exampleInputPassword1" placeholder="Enter your answer...">
                </div>
                <button type="Submit" class="btn btn-primary form-control btn-btn-low"><strong>Change</strong></button>
                <a href="index.php" class="btn btn-primary form-control btn-btn-low"><strong>Back to auth</strong></a>
                <?php
                  if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                  }
                  unset($_SESSION['message']);
                  
                ?>
                 
        </form>
    </body>
</html>
