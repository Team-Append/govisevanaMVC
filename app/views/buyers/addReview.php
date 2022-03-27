<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>

    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    
</head>

<body >
        <?php 
            include_once(APPROOT.'/views/includes/navigation.php');
        ?>  

<div class="wrapper" style="max-width: 600px;float: left;margin-left: 25%;">
    <div class="title">
      Add Review
    </div>
    <form action="" method="POST" name="createAccount" onsubmit="return(validate())">
    <div class="form">
    <span class="invalidFeedback">
              <?php echo $data['ratingError'];?>
          </span>
       <div class="inputfield">
          <label>Rate the farmer </label>
          <input type="text" class="input" name="rating" id="rating" placeholder="rate">
       </div>
       <label>write a review about the buyer </label>
       <span class="invalidFeedback">
              <?php echo $data['descriptionError'];?>
          </span>
          <input type="text" class="textarea" name="review" id="review" placeholder="review">
          
        <div class="inputfield" style="max-width: 100px; margin-left: 60px;">
         
          <input type="checkbox" id="select-all">
        </div>
        <div class="submit-btn">
        <input type="submit" value="submit" class="btn">
      </div>
       
 
</form>


</div>



</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
