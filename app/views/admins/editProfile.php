<?php if(isAdminLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/editProfStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footerStyles.css" />
  </head>
  <body>
    <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <header>
      <div class="order-title">
        <h2>HELLO <?php echo $_SESSION['name']?> !</h2>
      </div>
      
    </header>
    <hr>
    <div class="order-content">
      <div class="stock-image">
        <img src="<?php echo URLROOT;?>/img/pp.jpg" alt="profile image" height="225px">
      </div>
      <div class="stock-details">
          <div class="name">
            <h2>EDIT PROFILE</h2>
          </div>
          <div class="details">
          <form action="" method="POST" name="createAccount" >
          
            
              <span class="invalidFeedback" style="color: red;">
                  <?php echo $data['nameError'];?>
              </span>

            <div class="info-row">
              <div class="take-info">Full Name : </div><div class="info"><input type="text" name="name" value="<?php echo $data['posts']->name;?>"></div>
            </div>
            
            <span class="invalidFeedback" style="color: red;">
                <?php echo $data['NICError'];?>
              </span>
            <div class="info-row">
              
              <div class="take-info">NIC : </div><div class="info"><input type="text" name="nic" value="<?php echo $data['posts']->NIC;?>"></div>
            </div>
            
            <span class="invalidFeedback" style="color: red;">
                <?php echo $data['addressError'];?>
              </span>
            <div class="info-row">
              <div class="take-info">Address : </div><div class="info"><input type="text" name="address" value="<?php echo $data['posts']->address;?>"></div>
            </div>
            

            <span class="invalidFeedback" style="color: red;">
                <?php echo $data['emailError'];?>
              </span>
            <div class="info-row">
              <div class="take-info">E-mail Address: </div><div class="info"><input type="text" name="email" value="<?php echo $data['posts']->email;?>"></div>
            </div>

            <span class="invalidFeedback" style="color: red;">
                <?php echo $data['tpError'];?>
              </span>
            <div class="info-row">
              <div class="take-info">Telephone Number : </div>
              <div class="info"><input type="text" name="tpno" value="<?php echo $data['posts']->TPno;?>"></div>
            </div>
            
          </div>

          <div class="proceed-button">
          <input class="btn-proceed" type="submit" value="SAVE CHANGES">
              
          </div>
          
          </form>
      </div>    
    </div>

    <div class="footer">
        <?php include_once(APPROOT.'/views/includes/footer.php'); ?>
    </div>
  </body>

</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>