<?php
  session_start();
  require_once 'vendor/connect_view.php';


  if(!$_SESSION['user']){
    header('Location: index.php');
    }

    $check_session = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $_SESSION['user']['login'] . "' OR `email`='" . $_SESSION['user']['login'] . "'");
    $user = mysqli_fetch_assoc($check_session);
    $sessi = $user['session_log'];
    $user_admin = $user['rights'];
    if($_SESSION['user']['session_log'] != $sessi){
      
      $_SESSION['message'] = 'Session BAD .-.';
      unset($_SESSION['user']);
      header('Location: profile.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <title>User profile</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="s2.css">
    <link rel="stylesheet" href="s1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap" rel="stylesheet"> 
    <style>
      body{
        background: url(18.jpg);
        background-size: 100% 100%;
      }
    </style>
  </head>
  <body>
  
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#" style="padding-left: 30px">######</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php">Forum</a>
          </li>
        </ul>
      </div>
    </nav>


  
  <div class="form-man" style="margin-top: 70px">
            <?php 

            $useradmin = $user_admin;
              echo '<p >' . 'Hi <strong>' . $_SESSION['user']['login'] . '</strong>, great weather today' . '</p>';
              if($useradmin=="admin"){
                echo ' 
                <a class="btn btn-ban form-control btn-btn-low" href="admin.php"><div class="txta">' . "admin panel" . '</div></a>';
                echo '<a class="btn btn-primary form-control btn-btn-low" href="safety.php">Sign out from all devices</a>
                <p>
                  <a href="vendor/logout.php" class="logout">Exit</a>
                </p>  ';
              }
              else{
                echo '<a class="btn btn-primary form-control btn-btn-low" href="safety.php">Sign out from all devices</a>
                <p>
                  <a href="vendor/logout.php" class="logout">Exit</a>
                </p>  ';
              }
              
            ?>
            <div class="">
                    <?php
                    echo '<p >' .  'Account activity(5):' . '</p>';
                    
                    $check_user2 = mysqli_query($connect_view, "SELECT * FROM `logs` WHERE `login`='" . $_SESSION['user']['login'] ."' OR `login`='" . $_SESSION['user']['email'] . "' ORDER BY `time` DESC");
                    
                    
                    for($i=0; $i<5; $i++) {
                      $result = mysqli_fetch_array($check_user2);
                      echo "<span class='txtat' style=''>{$result['type']} {$result['ip']}: {$result['time']} </span><br>";
                    }


                    
                  ?>
                  </div>
            </div>
            <?php
            if($useradmin == "admin"){
            echo '
            <form action="vendor/right.php" method="post">
              <div class="mb-3">
                  <label for="exampleInputText1" class="form-label text-auth" style="color:red;"><strong>ADMIN actions</strong></label>
                </div>
                <select name="todo" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <option value="Block">Block user</option>
                  <option value="Unblock">Unblock user</option>
                  <option value="Moder">Grant moderator rights</option>
                  <option value="Unmoder">Take away moderator rights</option>
                </select>
              
              <div class="mb-3">
                  <input type="text" name="Login" class="form-control bord" id="exampleInputLogin" placeholder="Enter login">
                </div>
                <button type="Submit" class="btn btn-primary form-control btn-btn-low"><strong>Enter</strong></button>
                </form> '; }
            
            ?>

                  
            <form action="vendor/passwordChange.php"  method="post">
                <div class="mb-3 ">
                  <label for="exampleInputText1" class="form-label text-auth"><strong>Change password</strong></label>
                </div>
                <div class="mb-3">
                  <input type="password" name="oldpassword" class="form-control bord" id="exampleInputPassword1" placeholder="Enter old password...">
                </div>
                <div class="mb-3">
                  <input type="password" name="newpassword" class="form-control bord" id="exampleInputPassword2" placeholder="Enter new password...">
                </div>
                <button type="Submit" class="btn btn-primary form-control btn-btn-low"><strong>Change</strong></button>
                <?php
                  if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                  }
                  unset($_SESSION['message']);
                  
                  ?>
                 
              </form>

              
                
          
                  
          
            
        
  </body>
</html>
