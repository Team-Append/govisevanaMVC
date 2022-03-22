<?php if(isDeliveryPersonLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/styleDeliveryPersonDashboard.css">
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
                <h2><?php echo $_SESSION['name']?></h2>
                <hr>
            </div>
            <table id="farmer-card-stats">
                <tbody>
                    <tr>
                        <td class="stats-desc">Delivery requests</td>
                        <td class="stat">50</td>
                    </tr>
                    <tr>
                        <td class="stats-desc">Delivery completed</td>
                        <td class="stat">231</td>
                    </tr>
                    <tr>
                        <td class="stats-desc rating">Rating</td>
                        <td class="stat"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/deliveryPersons/selectDeliveryArea">
                <div class="dash-card">
                    <h3>Edit Delivery Areas</h3>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <a href="<?php echo URLROOT;?>/deliveryPersons/mySchedule">
            <div class="dash-card">
                <h3>View Schedule</h3>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
            </a>
            <a href="<?php echo URLROOT;?>/deliveryPersons/analytic">
            <div class="dash-card">
                <h3>Analytics</h3>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div>
            </a>
        </div>
        <div id="order-table">
            <h1>Current Deliveries</h1>
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
            <h1>Delivery person</h1>
            <hr>
            <h2><a href="<?php echo URLROOT;?>/deliveryPersons/editProfile">Edit profile</a></h2>
        </div>
    </div>

</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
