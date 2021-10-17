<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/myCartStyles.css" />
  </head>
  <body>
    <div class="detail">
      <div class="dtopic">
        <h1>My Cart</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Product</td>
            <td>Price</td>
            <td>Qty</td>
            <td>Total</td>
          </thead>
          <tbody>
            <tr>
              <td>
                <table>
                  <th>Carrot 20kg Stock</th>
                  <th><button type="button" name="button">Remove</button></th>
                  <tr>
                  <td><img class="cart-image" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="cartpic" style="width:100%"></td>
                  <td>Weight : <w>20kg</w> <br>
                    Shipping address : <sa> Abc <br> Colombo <br>
                    Call : <cl>+94775432124</cl>
                  </td>
                </tr>
                </table>
              </td>
              <td>Rs. <pr>3000.00</pr></td>
              <td><qt>1</qt></td>
              <td>Rs. <t>3000.00</t></td>
            </tr>
            <tr>
              <td>
                  Total Price
              </td>
              <td></td>
              <td></td>
              <td><div class="tpR">
                Rs. <tp>3000.00</tp>
              </div>
              </td>
            </tr>
          </tbody>
        </table>
        <hr>
      </div>
      <br><br>
      <div class="Proceed">
        <button type="button" name="button">Proceed to payment</button>
      </div>
    </div>
  </body>
</html>
