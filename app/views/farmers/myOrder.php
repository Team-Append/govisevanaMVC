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
            <td>shipping Address</td>
            <td>Unit Price</td>
            <td>qty</td>
            <td>Total</td>
            <td>Status</td>
            <td>delivery Options</td>
            
          </thead>
          <?php foreach ($data['orders'] as $order){ ?>
          <tbody>
            <tr class="rw">
              <td><?php echo $order-> orderID ?></td>
              <td class="col-description">
                <div class="s-details">
                  <div class="s-topic">
                    <h4><?php echo $order-> title ?></h4>
                  </div>
                  <div class="s-description">
                    <div class="image">
                    <img class="cart-image" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="cartpic" style="width:100%">
                    </div>
                    <div class="info">
                      <p><?php echo $order-> description ?></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $order-> shippingAddress ?></td>
              <td><?php echo $order-> fixedPrice ?></td>
              <td><?php echo $order-> qty ?></td>
              <td><?php echo $order-> qty * $order-> fixedPrice?></td>
              <td>
                <?php echo $order-> orderStatus ?>
                <div class="Proceed">
                  
                    <?php if($order-> orderStatus == 'pending'){ ?>
                        <a href="<?php echo URLROOT; ?>/farmers/myOrder?status=orderConfirmed&orderID=<?php echo $order-> orderID ?>">
                          <button type="button" name="button"> <?php echo "accept order";?> </button>
                        </a>
                        <?php } else if($order-> orderStatus == 'orderConfirmed'){?>
                          <a href="<?php echo URLROOT; ?>/farmers/myOrder?status=orderShipped&orderID=<?php echo $order-> orderID ?>">
                            <button type="button" name="button"> <?php echo "order shipped";?> </button>
                          </a>
                      <?php }else if($order-> orderStatus == 'shipped'){ ?>
                         
                      <?php }else if($order-> orderStatus == 'completed'){?>
                        <button type="button" name="button"> <?php echo "view review";?> </button>
                      <?php }?>

                  
                  
                </div>
              </td>
              <td>
                <a href="<?php echo URLROOT; ?>/farmers/suggestDelivery?farmerID=<?php echo $_SESSION['farmerID'] ?>&buyerID=<?php echo $order-> buyerID ?>">
                  <button type="button" name="button"> view delivery suggestions </button>
                </a>
              </td>
            </tr>
            <tr>
            </tr>
            
          </tbody>
          
          <?php } ?>
          
        </table>
        
      </div>
      <br><br>
      
    </div>
  </body>
</html>
