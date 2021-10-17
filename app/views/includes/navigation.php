
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navStyles.css" />
</head>
<body>
<div class="nav">
        <div class="logo">

        <img src="<?php echo URLROOT;?>/img/logo.png" alt="logo">
        </div>
        <div class="middle">
            <ul>
            <li class="right"><a href="<?php echo URLROOT;?>/pages/index">Home</a></li>
            <?php if(isset($_SESSION['farmerID'])) : ?>
            <li class="right"><a href="<?php echo URLROOT;?>/farmers/dashboard">Dashboard</a></li>
            <?php endif;?>
            <?php if(isset($_SESSION['buyerID'])) : ?>
            <li class="right"><a href="<?php echo URLROOT;?>/buyers/dashboard">Dashboard</a></li>
            <?php endif;?>
            <li class="right"><a href="contact.html">Stocks</a></li>
            <li class="right"><a href="index.html">Orders</a></li>
            <li class="right"><a href="contact.html">Contact Us</a></li>
            <li class="right"><a href="international.html">Help</a></li>
            </ul>
        </div>
        <div class="nav-right">
            <div class="notify">
                    <i class='bx bxs-bell'></i>
                </div>
            <div class="name">
                <?php if(isset($_SESSION['buyerID'])){ ?>
                    <a href="<?php echo URLROOT;?>/buyers/Logout">Log out</a>
                <?php }else if (isset($_SESSION['farmerID'])){ ?>
                    <a href="<?php echo URLROOT;?>/farmers/Logout">Log out</a>
                <?php }else if(isset($_SESSION['AdminID'])){ ?>
                    <a href="<?php echo URLROOT;?>/admins/logout">Log out</a>
                <?php }else {?>
                    <a href="<?php echo URLROOT;?>/pages/accountType">Log in</a>
                    <?php }?>
            </div>

            <div class="menu-icon">
                
                <div class="prof">
                <img src="<?php echo URLROOT;?>/img/profile.png" alt="profile picture">
                </div>
                <div class="menu">
                    <i class='bx bx-menu'></i> 
                </div>
                 
            </div>
        </div>
    </div>

</body>
</html>
    