<?php if(isFarmerLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">  
    <title>Dashboard</title> 
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
                    <img src="<?php echo URLROOT;?>/img/farmer.png" alt="">
                </div>
                <h1>Hello</h1>
                <h2><?php echo $_SESSION['name']?></h2>
                <hr>
            </div>
            <table id="farmer-card-stats">
                <tbody>
                    <tr>
                        <td class="stats-desc">Orders completed</td>
                        <td class="stat"><?php echo $data['completedOrders'] -> count?></td>
                    </tr>
                    <tr>
                        <td class="stats-desc">ongoing Orders</td>
                        <td class="stat"><?php echo $data['onGoingOrders'] -> count?></td>
                    </tr>
                    <tr>
                        <td class="stats-desc">Active Stock</td>
                        <td class="stat">12</td>
                    </tr>
                    <tr>
                        <td class="stats-desc rating">Rating</td>
                        <td class="stat"><?php if($data['rating']== NULL){
                            
                        }
                        else echo $data['rating'] -> averageRating;;?></td>
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
            <a href="<?php echo URLROOT;?>/farmers/completedOrders">
            <div class="dash-card">
                <h1>Completed Orders</h1>
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
                        <th>buyerName</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th> Visit Order Page</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <?php foreach($data['orders'] as $order){ ?>
                    <tr>
                        <td><?php echo $order -> orderID?></td>
                        <td><?php echo $order -> buyerName?></td>
                        <td><?php echo $order -> shippingAddress?></td>
                        <td><?php echo $order -> orderStatus?></td>
                        <td> <a href="<?php echo URLROOT;?>/farmers/myOrder"><input type="button" value="visit order page"> </button></a></td>
                    </tr>
                    <?php }?>
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