<?php if(isDeliveryPersonLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/viewSingleSchedule.css" />
    <title>My Schedule</title>
</head>
<body>
    <div class="nav">

    </div>
    <div class="noti-content">
        <div class="topic">
            <span class="main-topic">My Schedule | 2021/02/12</span><br>
           
            <hr>
        </div>
        <div class="noti-list">
            <div class="request-noti">
                <div class="details">
                    <ul>
                        <li><label for="fname"><b>Buyer Name :</b> Nimal de silva</label></li>
                        <li><label for="qty"><b>Expected Product :</b> Carrot</li>
                        <li><label for="qty"><b>Expected Quantity :</b> 25kg</li>
                        <li><label for="hdate"><b>Expected Date :</b> 1st September 2021</li>
                        <li><label for="category"><b>Category : </b>Vegetable</li>
                        <li><label for="contact"><b>Buyers's Contact Number :</b> 071 444 4444</li>
                        <li><label for="city"><b>Buyer's City : </b>Kandy</li>
                        <li><label for="description"><b>Description :</b> Any one from any area can buy whole stock at once if you <br> prefered. Or-else if you wish to buy more than 10 kg  contact me. <br>Delivery for island wide is available</li>
                    </ul>
                    <div class="buttons">
                        <input type="submit" value="Edit">
                        <input type="submit" value="Delete" class="del">
                    </div>
                </div>
               
            </div>
            
        </div>
    </div><br>
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