<?php if(isFarmerLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addStockStyle.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Style.css" />
    <title>Add Offer</title>
</head>
<body>
    <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    <div class="content">
        <div class="image">
            <img src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="vegetables"><br>
            <div class="img-content">
            
            </div>

        </div>
        <div class="form-side">
            <div class="topic">
                <span class="main-topic">Add Offer</span>
            </div>
            <form action="" method="POST">
                
                <label for="description">Description</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['offerDescriptionError'];?>
                </span>
                <br>
                <textarea rows="4" cols="35" name="offerDescription" id="offerDescription" placeholder="Add description here..."></textarea><br>
                 <br>

                <label > Price</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['offerPriceError'];?>
                </span>
                <br>
                <input type="text"  name="offerPrice" id="offerPrice" placeholder="Offered Price..">
                <br>
               
                <p><i class='bx bx-check-square' style='color:#5e5d5d' ></i>I agree to all the terms and conditions</p>  

                <input type="submit" value="Submit">
            </form>

        </div>
        
    </div>
    <div class="footer">
 
    </div>
</body>
</html>
<?php }  else{
    header('location:' .URLROOT. '/pages/index');
}?>