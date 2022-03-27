<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="<?php echo URLROOT; ?>/js/selectDistrict.js"></script>
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
              <div class="take-info">Offer description : </div><div class="info"><?php echo $data['posts']->offerDescription;?></div>
            </div>
            <div class="info-row">
              <div class="take-info">Category : </div><div class="info"><?php echo $data['posts']->catName;?></div> 
            </div>
            <div class="info-row">
              <div class="take-info">Offer Price: </div><div class="info"><?php echo $data['posts']->offerPrice;?></div>
            </div>

            <form method="POST">
              <div class="info-row">
                  <label for=""> Shipping Address :</label> 
              </div>
              <div class="info-row">
                  <input type="text" name="shippingAddress" id="shippingAddress" style="width: 80%;" value="<?php echo $data['posts']->address;?>">
              </div>
              <div class="info-row">
                  <span class="invalidFeedback">
                    <?php echo $data['provinceError'];?>
                  </span>
              </div>
              <div class="info-row">
                  <div class="inputfield">
                    <label>Province</label>
                    <select id="province" name="province" onchange="selectDistrict(this.id,'district')">
                      <option value=""></option>
                      <option value="Western">Western</option>
                      <option value="Central">Central</option>
                      <option value="Southern">Southern</option>
                      <option value="Uva">Uva</option>
                      <option value="Sabaragamuwa">Sabaragamuwa</option>
                      <option value="North Western">North Western</option>
                      <option value="North Central">North Central</option>
                      <option value="Nothern">Nothern</option>
                      <option value="Eastern">Eastern</option>
                    </select>
                  </div>
              </div>
              <div class="info-row">
                  <span class="invalidFeedback">
                          <?php echo $data['districtError'];?>
                      </span>
              </div>
              <div class="info-row">
                  <div class="inputfield">
                    <label>District</label>
                    <select id="district" name="district">
                      <option value=" "></option>
                    </select>
                  </div>
                 <div class="proceed-button">
                    <input class="btn-proceed" type="submit" value="PROCEED TO PAYMENT">
                 </div>
              </div>
            </form>  
             
          </div>

          
          
      </div>    
    </div>
  </body>



</html>
