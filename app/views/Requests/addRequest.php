<?php if(isBuyerLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/addReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Style.css" />
    <title>addStock</title>
</head>
<body>
    <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="content">
        <div class="image">
            <img src="<?php echo URLROOT; ?>/img/request.png" alt="vegetables"><br>
            <div class="img-content">
            
            <br>
            </div>

        </div>
        <div class="form-side">
            <div class="topic">
                <span class="main-topic">Add Request</span>
            </div>
            <form action="" method="POST">
                <label for="title">Expected Product Title</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['titleError'];?>
                </span>
                <input type="text" id="title" name="title" placeholder="Product name..">
                <br>

                <label for="qty">Expected Quantity</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['qtyError'];?>
                </span>
                <input type="text" id="qty" name="qty" placeholder="Quantity..">
                <br>

                <label for="reqCatagory">Select Category</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['reqCatagoryError'];?>
                </span>
                <select id="reqCatagory" name="reqCatagory" >
                    <option value="choose">Choose Category</option>
                    <option value="Carrot">Carrot</option>
                    <option value="Potatoes">Potatoes</option>
                    <option value="Leaves">Leaves</option>
                </select>
                <br>

                <label for="expectedDate">Expected Date</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['expectedDateError'];?>
                </span>
                <input type="date" id="expectedDate" name="expectedDate" placeholder="Expected Date..">
                <br>

                <label for="reqDescription">Description</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['reqDescriptionError'];?>
                </span>
                <textarea rows="4" cols="35" name="reqDescription" placeholder="Add description here..."></textarea><br>
                 
                <p><i class='bx bx-check-square' style='color:#5e5d5d' ></i>I agree to all the terms and conditions</p>  

                <input type="submit" value="Submit">
            </form>

        </div>
        
    </div>
    <div class="footer">
 
    </div>
</body>
</html>
<?php }?>