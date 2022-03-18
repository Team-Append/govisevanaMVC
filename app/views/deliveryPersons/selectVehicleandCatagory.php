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
      Create account
    </div>
    <form action="" method="POST" name="createAccount" onsubmit="return(validate())">
    <div class="form">
    <span class="invalidFeedback">
              <!-- <?php echo $data['vehicleError'];?> -->
          </span>
       <div class="inputfield">
          <label>Enter the delivery vehicle model </label>
          <input type="text" class="input" name="vehicle" id="vehicle" placeholder="vehicle model">
       </div>
       <label>select all the catagories that you like to deliver </label>
       <?php foreach($data['cat'] as $cat){ ?>
          <div class="inputfield" style="max-width: 100px;">
                <label><?php echo $cat -> catName; ?></label>
                <input type="checkbox"  name="<?php echo $cat -> catID; ?>" id="<?php echo $cat -> catID; ?>" value="<?php echo $cat -> catID; ?>" placeholder="r1">
          </div>
        <?php } ?>
        <div class="inputfield" style="max-width: 100px; margin-left: 60px;">
          <label >Select All</label>
          <input type="checkbox" id="select-all">
        </div>
        <div class="submit-btn">
        <input type="submit" value="submit" class="btn">
      </div>
       
 
</form>


</div>


<script>
      document.getElementById('select-all').onclick = function() {
    
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var checkbox of checkboxes) {
          checkbox.checked = this.checked;
      }
    }
</script>
</body>
</html>
