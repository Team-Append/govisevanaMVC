<?php if(isFarmerLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addStockStyle.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Style.css" />
    <title>addStock</title>
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
                <span class="main-topic">Add Stock</span>
            </div>
            <form action="" method="POST">
                <label >Product Title</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['titleError'];?>
                </span>
                <br>
                <input type="text" id="title" name="title" placeholder="title">
                <br>
                <label for="description">Description</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['descriptionError'];?>
                </span>
                <br>
                <textarea rows="4" cols="35" name="description" placeholder="Add description here..."></textarea><br>
                 <br>

                <label >Quantity</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['qtyError'];?>
                </span>
                <br>
                <input type="text"  name="qty" placeholder="Quantity..">
                <br>

                <label >Fixed Price</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['qtyError'];?>
                </span>
                <br>
                <input type="text"  name="fixedPrice" placeholder="Fixed Price..">
                <br>

                <label >Harvested Date</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['harvestDateError'];?>
                </span>
                <br>
                <input type="date"  name="harvestDate" placeholder="Harvested Date..">
                <br>

                <label >Expire Date</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['expireDateError'];?>
                </span>
                <br>
                <input type="date" name="expireDate" placeholder="Expire Date..">
                <br>

                <label for="catagory">Select Category</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['catagoryError'];?>
                </span>
                <br>
                <select id="catagory" name="catagory" >
                    <option value="choose">Choose Category</option>
                    <option value="Carrot">Carrot</option>
                    <option value="Potatoes">Potatoes</option>
                </select>
                <br>
                <label for="fname">Minimum bid price</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['minBidPriceError'];?>
                </span>
                <br>
                <input type="text"  name="minBidPrice" placeholder="Minimum bid price">
                <br>
                 <label for="image">Image</label><br>
                 <input type="file" id="image" name="image" placeholder="Upload an image">
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