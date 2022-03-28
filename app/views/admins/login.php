<?php if(!isUserLoggedIn()){ ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link rel="stylesheet" type="text/css" href="../public/css/styleLogin.css">
      <link rel="stylesheet" type="text/css" href="../public/css/style.css">
      
  </head>
    <body>

        <?php

            include_once(APPROOT.'/views/includes/navigation.php');
        ?>  
      <h1 class="title">Admin Login</h1>
      <div class="loginbox">
        <div class="cover">
          <img src="../img/logo.png" >
        </div>
        <h2>Welcome back</h2>
        <h1>Log in as a ADMIN</h1>
        <h3>Enter your email and password below</h3>

        <form class="" action="" method="post">
          <p>EMAIL</p>
          <span class="invalidFeedback">
              <?php echo $data['emailError'];?>
          </span>
          <input type="text" name="email" placeholder="email" id="email">
          <p>Password</p>
          <span class="invalidFeedback">
              <?php echo $data['passwordError'];?>
          </span>
          <input type="password" name="password" placeholder="Password" value="" id="password">
          
        <br>
          <input type="submit" name="submit" value="Login" id= "submit">
        <br>
          <h5><a href="#">Forgot password</a><h5>
        <br>
        <table>
          <tr>
            <!-- <th><h4>Don't have an account?</h4></th> -->
            <!-- <th><h5><a href="<?php echo URLROOT;?>/buyers/register">Sign up</a><h5></th> -->
          </tr>
        </table>
        </form>
    </div>

    </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>