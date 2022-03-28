<?php if(isAdminLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/notiStyles.css" />
    <title>Admin Notifications</title>
</head>
<body>
    <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="noti-content">
        <div class="topic">
            <span class="main-topic">Notifications | Reportings</span>
            <img src="<?php echo URLROOT; ?>/img/bell-ring.png" alt="notification-icon"><br>
            <hr>
        </div>
        <div class="noti-list">
            <div class="report-noti">
                <div class="details">
                    <ul>
                        <li><label for="fname"><b>Name :</b> Nimal de silva</label></li>
                        <li><label for="type"><b>Account Type :</b>Buyer</li>
                        <li><label for="contact"><b>Contact Number :</b> 071 444 4444</li>
                        <li><label for="raccount"><b>Reported Account :</b>Kamal de silva</li>
                        <li><label for="rtype"><b>Reported Account Type : </b>Farmer</li>
                        <li><label for="description"><b>Reason :</b> Any one from any area can buy whole stock at once if you <br> prefered. Or-else if you wish to buy more than 10 kg  contact me. <br>Delivery for island wide is available</li>
                    </ul>
                    <div class="buttons">
                        <input type="submit" value="Approve">
                        <input type="submit" value="Reject">
                        <input type="submit" value="Contact">
                    </div>
                </div>
               
            </div>
            
        </div>
    </div><br><br>
    <div class="footer">
        <hr>
        <div class="copyright">
            <p>Copyright © govisewana , All Right Reserved. </p>
        </div>

    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>