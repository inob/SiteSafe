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
    <title>Not safe sign in</title>
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
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="container text-center">
            <div class="my-5">
              <form action="vendor/notsafe.php" method="get">

                <div class="mb-3 ">
                  <label for="exampleInputText1" class="form-label text-auth text-auth-big"><strong>Login without protection</strong></label>
                  <input type="text" name="login" class="form-control bord" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter login...">
                </div>

                <div class="mb-3">
                  <input type="password" name="password" class="form-control bord" id="exampleInputPassword1" placeholder="Enter password...">
                </div>
                
                <button  type="Submit" class="btn btn-primary form-control btn-btn-low">Sign in</button>
                <a class="btn btn-primary form-control btn-btn" href="index.php">Try to login with protection</a>
                
                <h6 class="text-auth">--- Don't have an account? ---</h6>
                <a class="btn btn-primary form-control " href="register.php" >Registration</a>
                <?php
                  if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    
                  }
                  unset($_SESSION['message']);
                  
                  ?>
                
                
              </form>

            </div>
          </div>
        </div>
      </div>
      <br><br><br><br><br><br>
    </body>
</html>
