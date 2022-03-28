<?php if(!isModLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/notiStyles.css" />
    <title>Farmer Notifications</title>
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
        <?php foreach ($data['posts'] as $posts){ ?>
        <div class="noti-list">
        
            <div class="noti">
                <div class="noti-profile">
                    <img src="<?php echo URLROOT; ?>/img/prof.png" alt="profile image">

                </div>
                
                    <div class="noti-details">
                        <div class="noti-name">
                            <p><b><div class="info"></b>Pending stock post !</p>
                        </div>
                        <div class="noti-info">
                        <div class="info"><?php echo $posts->description;?></div>
                        <div class="time">
                            <div class="info"><?php echo $posts->notifdate;?></div>
                        </div>
                        <form action=""  method="POST" name="notify">
                            <!-- <div class="delete-button">
                                
                                <input type="submit" value="Delete" class="btn-delete">
                            </div> -->
                        </form>
                        
                        </div>
                    </div>
                
            </div>
            
        </div>
        <?php } ?>
    </div>
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
