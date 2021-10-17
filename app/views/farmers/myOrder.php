<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/myOrderStyle.css" />
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>My Orders</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Order number</td>
            <td>Description</td>
            <td>Price</td>
            <td>Status</td>
            <td>Total</td>
          </thead>
          <?php for ($i = 0; $i <= 3; $i++){ ?>
          <tbody>
            <tr class="rw">
              <td>1234532</td>
              <td class="col-description">
                <div class="s-details">
                  <div class="s-topic">
                    <h4>Carrot 20kg Stock</h4>
                  </div>
                  <div class="s-description">
                    <div class="image">
                    <img class="cart-image" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="cartpic" style="width:100%">
                    </div>
                    <div class="info">
                      <p>Weight : <w>20kg</w> <br>
                      Shipping address : <sa> Abc <br> Colombo <br>
                      Call : <cl>+94775432124</cl></p>
                    </div>
                  </div>
                </div>
              </td>
              <td>Rs. <pr>3000.00</pr></td>
              <td><st>Shipped</st></td>
              <td>Rs. <t>3000.00</t></td>
            </tr>
            <tr>
            </tr>
            
          </tbody>
          
          <?php } ?>
          
        </table>
       
      </div>
      <br><br>
      <div class="Proceed">
        <button type="button" name="button">Mark as complete</button>
      </div>
    </div>
  </body>
</html>
