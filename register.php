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
    <title>Registration</title>
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
              <form action="vendor/signup.php" method="post">
                <div class="mb-3 ">
                  <label for="exampleInputText1" class="form-label text-auth text-auth-big"><strong>Registration</strong></label>
                  <input type="text" name="login" class="form-control bord" required minlength="4" maxlength="25" id="exampleInputText1" aria-describedby="textHelp" placeholder="Enter login...">
                </div>
                <div class="mb-3">
                  <input type="email" name="email" class="form-control bord" required minlength="4" maxlength="25" id="exampleInputEmail" placeholder="Enter email...">
                </div>
                <div class="mb-3">
                  <input type="password" name="password" class="form-control bord" id="exampleInputPassword1" required minlength="4" maxlength="25" placeholder="Enter password...">
                </div>
                <div class="mb-3">
                  <input type="password" name="password_repeat" class="form-control bord" id="exampleInputPassword1" required minlength="4" maxlength="25" placeholder="Password confirmation..">
                </div>

                <label for="exampleInputText1" class="form-label"><strong>Secret question</strong></label>
                <select name="question" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                  <option value="What was the name of your first pet?">What was the name of your first pet?</option>
                  <option value="What was your first car?">КWhat was your first car?</option>
                  <option value="What is your grandmother's maiden name?">What is your grandmother's maiden name?</option>
                  <option value="What was the name of your third grade teacher?">What was the name of your third grade teacher?</option>
                  <option value="What was the name of your favorite teacher?">What was the name of your favorite teacher?</option>
                  <option value="What job did you dream of as a child?">What job did you dream of as a child?</option>
                  <option value="Who was your childhood hero?">Who was your childhood hero?</option>
                  <option value="What was the first concert you attended?">What was the first concert you attended?</option>
                  <option value="In which country and city do you want to live in retirement?">In which country and city do you want to live in retirement?</option>
                  <option value="What is the name of your favorite teacher at the university?">What is the name of your favorite teacher at the university?</option>
                  <option value="What place did you like to visit as a child?">What place did you like to visit as a child?</option>
                  <option value="In which country is your dream vacation?">In which country is your dream vacation?</option>
                </select>
                <div class="mb-3">
                  <input type="text" name="answer" class="form-control bord" id="exampleInputAnswer1" required maxlength="25" placeholder="Answer to the secret question..">
                </div>
                <button type="Submit" class="btn btn-primary form-control btn-btn">Create an account</button>
                
                <h6 class="text-auth">-- Already have an account ? --</h6>
                <a class="btn btn-primary form-control" href="index.php" >Sign in</a>
               
                <?php
                  if($_SESSION['message']){
                    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    
                  }
                  unset($_SESSION['message']);
                  
                  ?>
               </p>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </body>
</html>
