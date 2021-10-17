<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/reviewFarmerStyles.css" />
  </head>
  <body>
  <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="mainR">
      <div class="sideL">
        <div class="t1">
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
              <td>Stock as description</td>
              <td>*****</td>
            </tr>
            <tr>
              <td>Delivered on time</td>
              <td>***</td>
            </tr>
            <tr>
              <td>Communication</td>
              <td>***</td>
            </tr>
          </table>
        </div>
        <div class="t1">
          <h2>Review farmer</h2>
        </div>
        <div class="reviewbox">
          <form action="/action_page.php">
            <textarea id="w3review" name="w3review" rows="8" cols="208" placeholder="Write the review"></textarea>
            <br><br>
            <input type="submit" value="Submit">
          </form>
        </div>
      </div>
      <div class="sideR">
        <div class="sideR-top">
          <img src="<?php echo URLROOT; ?>/img/farmer.png" alt="farmer" style="width:40%">
          <div class="caption">
            Farmer
          </div>
        </div>
        <div class="sideR-bottom">
          <table class="detail">
            <tr>
              <td>Ratings</td>
              <td>***</td>
            </tr>
            <tr>
              <td><b>Address</b></td>
              <td></td>
            </tr>
            <tr>
              <td><b>Contact No</b></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
