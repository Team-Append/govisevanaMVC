<?php if(isDeliveryPersonLoggedIn()){ ?>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/myOrderStyle.css" />
    <script>    <?php if(isset($_GET['alert'])){?>
      <?php if($_GET['alert'] == 'reviewDone'){?>
          window.alert('review Successfully added');
      <?php } ?>  
    <?php }?>
    </script>

  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>My delivery Orders</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Delivery Order ID</td>
            <td>Order number</td>
            <td>Farmer Name</td>
            <td>Buyer Name</td>
            <td>pickup Address</td>
            <td>shipping Address</td>
            <td>Total Price</td>
            <td>status</td>
            
          </thead>
          <?php foreach ($data['deliveryOrders'] as $deliveryorder){ ?>
          <tbody>
            <tr class="rw">
              <td><?php echo $deliveryorder-> deliveryOrderID ?></td>
              <td class="col-description">
                
                    <?php echo $deliveryorder-> orderID ?>
                 
              </td>
              <td><?php echo $deliveryorder-> farmerName ?></td>
              <td><?php echo $deliveryorder-> buyerName ?></td>
              <td><?php echo $deliveryorder-> pickupAddress ?></td>
              <td><?php echo $deliveryorder-> DeliveryAddress?></td>
              <td><?php echo $deliveryorder-> Total?></td>
              <td>
                <?php echo $deliveryorder-> orderStatus ?>
               
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
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
