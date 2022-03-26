<?php if(isDeliveryPersonLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addScheduleStyles.css" />
    <title>addSchedule</title>
</head>
<body>
    <div class="nav">
        
    </div>
    <div class="content">
        <div class="image">
            <img src="./images/addstock1.gif" alt="vegetables"><br>
            <div class="img-content">
            sdfdsfgdf sdfdg fgfdhg hgdjghkjhk gnhmhjmjhmjhmbr sndkdjsfhdshfdsbf dsjhfsd
            <br>sndkdjsfhdshfdsbf dsjhfsd
            </div>

        </div>
        <div class="form-side">
            <div class="topic">
                <span class="main-topic">Add Schedule</span>
            </div>
            <form action="/action_page.php">
                <label for="fname">Product Name</label><br>
                <input type="text" id="fname" name="Productname" placeholder="Product name..">
                <br>

                <label for="fname">Quantity</label><br>
                <input type="text" id="fname" name="quantity" placeholder="Quantity..">
                <br>

                <label for="fname">Fixed Price</label><br>
                <input type="text" id="fname" name="fixedprice" placeholder="Fixed Price..">
                <br>

                <label for="fname">Harvested Date</label><br>
                <input type="date" id="fname" name="Hdate" placeholder="Harvested Date..">
                <br>

                <label for="fname">Expire Date</label><br>
                <input type="date" id="fname" name="Edate" placeholder="Expire Date..">
                <br>

                <label for="category">Select Category</label><br>
                <select id="category" name="category" >
                    <option value="choose">Choose Category</option>
                    <option value="vegetable">Vegetable</option>
                    <option value="fruit">Fruit</option>
                    <option value="dry">Dry Product</option>
                </select>
                <br>

                 <label for="image">Image</label><br>
                 <input type="file" id="image" name="image" placeholder="Upload an image">
                <br>

                <label for="description">Description</label><br>
                <textarea rows="4" cols="35" name="comment" form="usrform">Add description here...</textarea><br>
                 
                <p><i class='bx bx-check-square' style='color:#5e5d5d' ></i>I agree to all the terms and conditions</p>  

                <input type="submit" value="Submit">
            </form>

        </div>
        
    </div>
    <div class="footer">
 
    </div>
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>