<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Completed Orders</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/styleCompleteOrders.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
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
        <h1>Completed Orders</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Order number</td>
            <td>Stock Description</td>
            <td>Farmer Name</td>
            <td>Contact Number</td>
            <td>Completed Date</td>
            <td>Farmer Review</td>
           
          </thead>
          <?php foreach ($data['posts'] as $post){ ?>
          <tbody>
            <tr class="rw">
              <td><?php echo $post-> orderID;?></td>
              <td class="col-description">
                <div class="s-details">
                  <!-- <div class="s-topic">
                    <h4><?php echo $post-> title ?></h4>
                  </div> -->
                  <div class="s-description">
                    <div class="image">
                    <img class="cart-image" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="cartpic" style="width:100%">
                    </div>
                    <div class="info">
                      <p><?php echo $post-> description; ?></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $post-> name; ?></td>
              <td><?php echo $post-> tpno; ?></td>
              <td><?php echo $post-> orderDate; ?></td>
              <td><a href="<?php echo  URLROOT?>/buyers/reviewFarmer?orderID=<?php echo $post-> orderID;?>"></a><button type="button" name="button"> Add review </button></td>
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
