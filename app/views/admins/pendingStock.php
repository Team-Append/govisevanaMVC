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

    </div>
    <div class="noti-content">
        <div class="topic">
            <span class="main-topic">Pending Farmer Stocks</span>
            <img src="<?php echo URLROOT; ?>/img/bell-ring.png" alt="notification-icon"><br>
            <hr>
        </div>
        <div class="noti-list">
        <?php  foreach($data['posts'] as $post){ ?>
            <div class="stock-noti">
                <div class="image">
                    <img src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="image of stock">

                </div>
                <div class="details">
                    <ul>
                        <li><label for="fname"><b>Farmer Name :</b> <?php echo $post->name ;?></label></li>
                        <li><label for="qty"><b>Quantity :</b> <?php echo $post->qty ;?>kg</li>
                        <li><label for="price"><b>Fixed Price :</b> LKR <?php echo $post->fixedPrice ;?></li>
                        <li><label for="hdate"><b>Harvested Date :</b> <?php echo $post->harvestDate ;?></li>
                        <li><label for="edate"><b>Expire Date :</b> <?php echo $post->expireDate ;?></li>
                        <li><label for="category"><b>Category : </b><?php echo $post->catagory ;?></li>
                        <li><label for="contact"><b>Farmer's Contact Number :</b> <?php echo $post->tpno ;?></li>
                        <li><label for="city"><b>Farmer's address : </b><?php echo $post->address ;?></li>
                        <li><label for="description"><b>Description :</b> <?php echo $post->description ;?></li>
                    </ul>
                    <?php $_SESSION['currentStockID'] = $post -> stockID; ?>
                    <div class="buttons">
                        <form action="" method="POST">
                            <input type="submit" value="Approve" name="approve" >
                            <input type="submit" value="Reject" name="reject">
                        </form>
                    </div>
                </div>
               
            </div> 
            <br>
            <br>
            <br>
        <?php } ?>
        </div>     
 <br>
    <div class="footer">
        <hr>
        <div class="copyright">
            <p>Copyright © govisewana , All Right Reserved. </p>
        </div>

    </div>
    
</body>
</html>