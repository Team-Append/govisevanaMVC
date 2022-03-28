<?php if(isset($_GET['orderID'])){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Reveiw Farmer</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/reviewFarmerStyles.css" />
  </head>
  <body>
  <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="mainR">
      <div class="sideL">
        <div class="t1">
        <form method="POST">
          <table>
            <tr>
              <td><b>Review farmer</b></td>
            </tr>
            <tr>
              <td>Rate farmer</td>
            </tr>
          </table>
        </div>
        <div class="rate">
          <table class="tble">
            <tr>
              <td>rate the Farmer</td>
              <span class="invalidFeedback" style="color: red;">
                  <?php echo $data['ratingError'];?>
              </span>
              <td><input type="number" name="rating" id="rating" min="1" max="5" placeHolder="rate between 1-5"></td>
            </tr>
          </table>
        </div>
        <div class="t1">
          <h2>Review farmer</h2>
          <span class="invalidFeedback" style="color: red;">
                  <?php echo $data['descriptionError'];?>
            </span>
        </div>
        <div class="reviewbox">
          
            <textarea id="description" name="description" rows="8" cols="208" placeholder="Write the review"></textarea>
            <br><br>
            <input type="submit" value="Submit">
         
        </div>
      </div>
      <div class="sideR">
        <div class="sideR-top">
          <img src="<?php echo URLROOT; ?>/img/farmer.png" alt="farmer" style="width:40%">
          <div class="caption">
            Farmer <?php echo $data['farmer']->name ?>
          </div>
        </div>
        <div class="sideR-bottom">
          <table class="detail">
            <tr>
              <td><b>Address</b></td>
              <td><?php echo $data['farmer']->address ?></td>
            </tr>
            <tr>
              <td><b>Contact No</b></td>
              <td><?php echo $data['farmer']->tpno ?></td>
            </tr>
          </table>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
<?php } else{
  header('location:' .URLROOT. '/pages/index');
}?>