<?php if(isBuyerLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css"> 
    <title>Dashboard</title>  
</head>
<body>
<?php if(isset($_GET['status'])){ ?>
<?php if($_GET['status']=='success'){ ?>
        <script>window.alert("Request successfully added");</script>
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
                        <td class="stats-desc">Current orders</td>
                        <td class="stat">50</td>
                    </tr>
                    <tr>
                        <td class="stats-desc">Orders completed</td>
                        <td class="stat">231</td>
                    </tr>
                    <tr>
                        <td class="stats-desc">current requests</td>
                        <td class="stat">12</td>
                    </tr>
                    <!-- <tr>
                        <td class="stats-desc rating">Rating</td>
                        <td class="stat"></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/requests/addRequest">
                <div class="dash-card">
                    <h1>Add Requests</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <a href="<?php echo URLROOT;?>/buyers/myRequest">
            <div class="dash-card">
                <h1>My Requests</h1>
                <img src="<?php echo URLROOT;?>/img/icons/offer.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/buyers/ongoingorders">
            <div class="dash-card">
                <h1>ongoing orders</h1>
                <img src="<?php echo URLROOT;?>/img/icons/earn.png" alt="">
            </div>
            </a>
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/buyers/completedOrder">
            <div class="dash-card">
                <h1>completed orders</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/buyers/contactAdmin">
            <div class="dash-card">
                <h1>Contact Admins</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/buyers/analytic">
            <div class="dash-card">
                <h1>Analytics</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div>
            </a>
        </div>
        <div id="order-table">
            <h1>current orders</h1>
            <table>
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
            <h1>Buyer</h1>
            <hr>
            <h2><a href="<?php echo URLROOT;?>/buyers/editProfile">Edit profile</a></h2>
        </div>
    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>