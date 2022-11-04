<?php
  session_start();
  require_once 'vendor/connect_view.php';
  $check_session = mysqli_query($connect_view, "SELECT * FROM `user` WHERE `login`='" . $_SESSION['user']['login'] . "' OR `email`='" . $_SESSION['user']['login'] . "'");
  $user = mysqli_fetch_assoc($check_session);
  $user_admin = $user['rights'];

  if(!$_SESSION['user']){
    header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1" />
    <title>Forum</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="s3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@300&display=swap" rel="stylesheet"> 
    <style>
      body{
        
        background: url(fon3.jpg);
        background-size: 100%;

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
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php">Forum<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    
    <div class="form-man" style="margin-top: 60px; word-wrap: break-word; padding-top: 10px;">
    <?php
                    
                    $check_user2 = mysqli_query($connect_view, "SELECT * FROM `forum` ORDER BY `id` DESC LIMIT 5");
                    
                    
                    for($i=0; $i<5; $i++) {
                      $result = mysqli_fetch_array($check_user2);
                      if($result){
                      echo "<div style='border: 3px solid #fff; margin: 10px; border-radius: 20px;padding-left:20px; background-color: rgba(153, 153, 220, 40%);'>";
                      echo "<span class='txtat ' style='font-size:18px; '><strong>{$result['user']} </strong> </span>";
                      echo "<span class='txtat' style='text-align: right; font-size: 10px;'><i>{$result['time']}</i> </span><br>";
                      echo "<span class='txtat'>&nbsp&nbsp{$result['message']}<br> </span>";
                      if($user_admin=="admin"){
                        echo "<a style='text-align:left; color:red;' href='#'> [DELETE] </a>";
                      }else{ echo "<br>";}
                        echo "</div>";
                      
                      }
                      

                    } 
                    
    ?>
    </div> 
    <form class="form-man" action="vendor/message.php" method="post" style="padding:1%;">
    <div class="mb-3">
                  <input type="text" name="message" class="form-control bord" id="exampleInputLogin" placeholder="Enter message">
                </div>
      <button type="Submit" class="btn btn-primary form-control btn-btn-low"><strong>Enter</strong></button>
    </form>
  


            
    
          
                  
          
            
        
  </body>
</html>
