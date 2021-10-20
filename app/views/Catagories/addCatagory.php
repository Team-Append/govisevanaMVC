<?php if(isAdminLoggedIn()){ ?>
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
                <span class="main-topic">Add Catagory</span>
            </div>
            <form action="" method="POST">
                <label >Catagory name</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['catNameError'];?>
                </span>
                <br>
                <input type="text" id="catName" name="catName" placeholder="Catagory Name">
                <br>
                <label for="description">Catagory Description</label><br>
                <span class="invalidFeedback">
                    <?php echo $data['catDescriptionError'];?>
                </span>
                <br>
                <textarea rows="4" cols="35" name="catDescription" placeholder="Add description here..."></textarea><br>
                 <br>
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