<?php if(isModLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
    <title> Dashboard </title>
</head>
<body>
<?php

include_once(APPROOT.'/views/includes/navigation.php');
?>  
    <div id="dashboard">
        <div id="profile-info-card">
            <div class="profile-upper">
                <div class = "profile-pic">
                    <img src="<?php echo URLROOT;?>/img/pp.jpg" alt="">
                </div>
                <h1>Hello</h1>
                <h2><?php echo $_SESSION['modName']?></h2>
                <hr>
            </div>

        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/Requests/pendingRequest">
                <div class="dash-card">
                    <h1>Pending Requests</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <a href="<?php echo URLROOT;?>/stocks/pendingStock">
            <div class="dash-card">
                <h1>Pending Stocks</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/">
            <div class="dash-card">
                <h1>Complains</h1>
                <img src="<?php echo URLROOT;?>/img/icons/offer.png" alt="">
            </div>
            </a>
        </div>
        <div class="card-line">
            <!-- <a href="<?php echo URLROOT;?>/">
            <div class="dash-card">
                <h1>*****</h1>
                <img src="<?php echo URLROOT;?>/img/icons/earn.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/">
            <div class="dash-card">
                <h1>****</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/">
            <div class="dash-card">
                <h1>*****</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div>
            </a> -->
        </div>
    
    </div>

</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
