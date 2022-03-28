<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Requests</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/styleCompleteOrders.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    <div class="detail">
      <div class="dtopic">
        <h1>My Requests</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Budget</td>
            <td>Request Description</td>
            <td>Catagory</td>
            <td>Expected Date</td>
            <td>Status</td>
           
            
            
          </thead>
          <?php foreach ($data['posts'] as $post){ ?>
          <tbody>
            <tr class="rw">
              <td><?php echo $post->budget;?></td>
              <td class="col-description">
                <div class="s-details">
                  <!-- <div class="s-topic">
                    <h4><?php echo $post->catName;?></h4>
                  </div> -->
                  <div class="s-description">
                  <!-- <div class="image">
                    <img class="cart-image" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="cartpic" style="width:100%">
                    </div> -->
                    <div class="info">
                      <p><?php echo $post->reqDescription;?></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $post->catName;?></td>
              <td><?php echo $post->expectedDate;?></td>
              <td><?php echo $post->reqStatus;?>
              <div class="Proceed">
                  
              <a href="<?php echo URLROOT;?>/Buyers/viewOffers?RID=<?php echo $post->RID;?>">
                  <input type="button" value="View Offers">
                  </a>
                
                
              </div>
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
