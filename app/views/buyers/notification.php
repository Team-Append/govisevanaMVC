<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/notiStyles.css" />
    <title>Buyer Notifications</title>
</head>
<body>
    <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="noti-content">
        <div class="topic">
            <span class="main-topic">Notifications</span>
            <img src="<?php echo URLROOT; ?>/img/bell-ring.png" alt="notification-icon"><br>
            <hr>
        </div>
        <div class="noti-list">
            <div class="noti">
                <div class="noti-profile">
                    <img src="<?php echo URLROOT; ?>/img/prof.png" alt="profile image">

                </div>
                <div class="noti-details">
                    <div class="noti-name">
                        <p><b>Kamal de Silva</b> sent an offer</p>
                    </div>
                    <div class="noti-info">
                        Offer sent by farmer kamal de silva to the request,posts by you on 14th saturday

                    </div>
                    <div class="time">
                        10 hours ago
                    </div>

                </div>
            </div>
            <div class="pre-noti">
                <div class="noti">
                    <div class="noti-profile">
                        <img src="<?php echo URLROOT; ?>/img/prof.png" alt="profile image">
                    </div>
                    <div class="noti-details">
                        <div class="noti-name">
                            <p><b>Kamal de Silva</b> sent an offer</p>
                        </div>
                        <div class="noti-info">
                            Offer sent by farmer kamal de silva to the request,posts by you on 14th saturday

                        </div>
                        <div class="time">
                            10 hours ago
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <hr>
        <div class="copyright">
            <p>Copyright © govisewana , All Right Reserved. </p>
        </div>

    </div>
    
</body>
</html>