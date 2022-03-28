<?php if(isAdminLoggedIn()){ ?>
    
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css"> 
    <title>Admin Dashboard</title>  
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
            <a href="<?php echo URLROOT;?>/stocks/pendingStock">
                <div class="dash-card">
                    <h1>Pending Stock</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/stock.png" alt="">
                </div>
            </a>
            <a href="<?php echo URLROOT;?>/Requests/pendingRequest">
                <div class="dash-card">
                    <h1>Pending Requests</h1>
                    <img src="<?php echo URLROOT;?>/img/icons/offer.png" alt="">
                </div>
            </a>
            <!--<div class="dash-card">
                <h1>Reports</h1>
                <img src="<?php echo URLROOT;?>/img/icons/earn.png" alt="">
            </div> -->
            <a href="<?php echo URLROOT;?>/admins/buyerList">
            <div class="dash-card">
                <h1>View buyer List</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
        </a>
        </div>
        <div class="card-line">
        <a href="<?php echo URLROOT;?>/Catagories/addCatagory">
            <div class="dash-card">
                <h1>Add Catagory</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
        </a>
        <a href="<?php echo URLROOT;?>/admins/manageModerators">
            <div class="dash-card">
                <h1>Moderators</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
        </a>
           <!-- <div class="dash-card">
                <h1>Analytics</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div> -->
            <a href="<?php echo URLROOT;?>/admins/farmerList">
            <div class="dash-card">
                <h1>View farmer list</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
        </a>
        </div>
<!-- -->
        <div class="card-line">
        <!-- <a href="<?php echo URLROOT;?>/admins/buyerList">
            <div class="dash-card">
                <h1>View buyer List</h1>
                <img src="<?php echo URLROOT;?>/img/icons/req.png" alt="">
            </div>
        </a>
        <a href="<?php echo URLROOT;?>/admins/farmerList">
            <div class="dash-card">
                <h1>View farmer list</h1>
                <img src="<?php echo URLROOT;?>/img/icons/admin.png" alt="">
            </div>
        </a>
    
        <div class="dash-card">
                <h1>View Delivery Person list</h1>
                <img src="<?php echo URLROOT;?>/img/icons/analytics.png" alt="">
            </div> -->
        </div>
    
<!-- -->


        <div id="order-table">
            <h1>Active stocks</h1>
            <table>
                <thead>
                    <tr>
                        <th>catagory</th>
                        <th>Description</th>
                        <th>no of stock</th>
                        <th>no of Active orders</th>
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
            <h2><a href="<?php echo URLROOT;?>/admins/editProfile">Edit profile</a></h2>
        </div>
    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>