<?php if(isFarmerLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">   
</head>
<body>
<?php if(isset($_GET['status'])){ ?>
<?php if($_GET['status']=='success'){ ?>
        <script>window.alert("stock successfully added");</script>
    <?php } }?>
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
                <h2><?php echo $_SESSION['name']?></h2>
                <hr>
            </div>
            <table id="farmer-card-stats">
                <tbody>
                    <tr>
                        <td class="stats-desc">Orders Completed </td>
                        <td class="stat">50</td>
                    </tr>
                    <tr>
                        <td class="stats-desc">Stock Posts </td>
                        <td class="stat">231</td>
                    </tr>
                    <tr>
                        <td class="stats-desc">Pending Stock Posts</td>
                        <td class="stat">12</td>
                    </tr>
                    <tr>
                        <td class="stats-desc rating">Rating</td>
                        <td class="stat"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/stocks/addStock">
                <div class="dash-card">
                    <h1>Add stock</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <a href="<?php echo URLROOT;?>/farmers/myStock">
            <div class="dash-card">
                <h1>My stock</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/farmers/offersSent">
            <div class="dash-card">
                <h1>Offers Sent</h1>
                <img src="<?php echo URLROOT;?>/img/icons/offer.png" alt="">
            </div>
            </a>
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/farmers/earning">
            <div class="dash-card">
                <h1>Earnings</h1>
                <img src="<?php echo URLROOT;?>/img/icons/earn.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/Requests/viewRequest">
            <div class="dash-card">
                <h1>Buyer Requests</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/farmers/myOrder">
            <div class="dash-card">
                <h1>My orders</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div>
            </a>
        </div>
        <div id="order-table">
            <h1>current orders</h1>
            <table >
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Delivery Date</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id = "edit-profile-card">
            <h1>Farmer</h1>
            <hr>
            <h2><a href="<?php echo URLROOT;?>/farmers/editProfile">Edit profile</a></h2>
        </div>
    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>