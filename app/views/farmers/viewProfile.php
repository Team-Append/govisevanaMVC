<?php if(isFarmerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profileStyles.css" />
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
            <h2>PROFILE DETAILS</h2>
          </div>
          <div class="details">
          
            <div class="info-row">
              <div class="take-info">Full Name : </div><div class="info"><?php echo $data['posts']->name;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">NIC : </div><div class="info"><?php echo $data['posts']->NIC;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Address : </div><div class="info"><?php echo $data['posts']->address;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">E-mail Address: </div><div class="info"><?php echo $data['posts']->email;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Telephone Number : </div><div class="info"><?php echo $data['posts']->tpno;?></div>
            </div>
            
          </div>

          <div class="proceed-button">
            <a href="<?php echo URLROOT;?>/farmers/editProfile"><input class="btn-proceed" type="button" value="EDIT PROFILE"></a>
          </div>

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