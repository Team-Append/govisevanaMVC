<?php if(isAdminLoggedIn()){ ?>
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">   
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
                <h1>Hello Admin</h1>
                <h2><?php echo $_SESSION['name']?></h2>
                <hr>
            </div>
            <!-- <table id="farmer-card-stats">
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
                    <tr>
                        <td class="stats-desc rating">Rating</td>
                        <td class="stat"></td>
                    </tr> 
                </tbody>
            </table> -->
        </div>
        <div class="card-line">
            <a href="<?php echo URLROOT;?>/admins/pendingStock">
                <div class="dash-card">
                    <h1>Pending Stock</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <div class="dash-card">
                <h1>Pending Requests</h1>
                <img src="<?php echo URLROOT;?>/img/icons/offer.png" alt="">
            </div>
            <div class="dash-card">
                <h1>Reports</h1>
                <img src="<?php echo URLROOT;?>/img/icons/earn.png" alt="">
            </div>
        </div>
        <div class="card-line">
            <div class="dash-card">
                <h1>Admin Contacts</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
            <div class="dash-card">
                <h1>Complains</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
            <div class="dash-card">
                <h1>Analytics</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div>
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
            <h1>Admin</h1>
            <hr>
            <h2>Edit profile</h2>
        </div>
    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>