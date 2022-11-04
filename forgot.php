<?php
  session_start();
  if($_SESSION['user']){
  header('Location: profile.php');
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  
    <body>
        <form action="continueForgot.php" method="post">
                <div class="mb-3 ">
                  <label for="exampleInputText1" class="form-label text-auth"><strong>Change password</strong></label>
                </div>
                <?php
                  //  echo '<label for="exampleInputText1" class="form-label"><strong>' .$user['question']. '</strong></label>';
                ?>
                <div class="mb-3">
                  <input type="text" name="email" class="form-control bord" id="exampleInputPassword1" placeholder="Enter your email...">
                </div>
                <div class="mb-3">
                  <input type="password" name="password1" class="form-control bord" id="exampleInputPassword1" placeholder="Enter your new password...">
                </div>
                <div class="mb-3">
                  <input type="password" name="password2" class="form-control bord" id="exampleInputPassword1" placeholder="Confirm password...">
                </div>
                <div class="g-recaptcha" data-sitekey="6LcoNVUiAAAAAKqZTZuwKkVH9sv79IPUpsjUSOq5" style="margin-bottom:1em";></div>
                <button type="Submit" class="btn btn-primary form-control btn-btn-low"><strong>Change Password</strong></button>
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
