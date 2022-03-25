<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/orderConfirmStyles.css">
  </head>
  <body>
    <header>
      <div class="order-title">
        <h2>ORDER CONFIRMATION</h2>
      </div>
      
    </header>
    <hr>
    <div class="order-content">
      <div class="stock-image">
        <img src="carrot.jpg" alt="Stock image" height="225px">
      </div>
      <div class="stock-details">
          <div class="name">
            <h2>ORDER DETAILS</h2>
          </div>
          <div class="details">
            <div class="info-row">
              <div class="take-info">Farmer : </div><div class="info"><?php echo $data['posts']->name;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Stock Name : </div><div class="info"><?php echo $data['posts']->description;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Category : </div><div class="info"><?php echo $data['posts']->catName;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Unit Price: </div><div class="info"><?php echo $data['posts']->fixedPrice;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Quantity : </div><div class="info"><?php echo $data['posts']->qty;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Total : </div><div class="info"><?php echo $data['posts']->qty * $data['posts']->fixedPrice;?></div>
            </div>
            <div class="info-row">
              <form method="POST">
                 <label for=""> Shipping Address :</label> 
                 <br>
                 <input type="text" name="shippingAddress" id="shippingAddress" style="width: 100%;" value="<?php echo $data['posts']->address;?>">
                 <div class="proceed-button">
                    <input class="btn-proceed" type="submit" value="PROCEED TO PAYMENT">
                 </div>
              </form>  
            </div>  
          </div>

          
          
      </div>    
    </div>
  </body>



</html>
