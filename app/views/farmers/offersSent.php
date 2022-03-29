<?php if(isfarmerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Completed Orders</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/styleCompleteOrders.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    <div class="detail">
      <div class="dtopic">
        <h1>Offers Sent</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>Offer number</td>
            <td>request</td>
            <td>Buyer Name</td>
            <td>Offer Description</td>
            <td>Offer Price</td>
            <td> Offer Status</td>
           
          </thead>
        <?php foreach ($data['posts'] as $post){ ?>
          <tbody>
            <tr class="rw">
            <td><?php echo $post-> offerID; ?></td>
              <td><?php echo $post-> title;?></td>
              <td class="col-description">
                <div class="s-details">
                  <div class="s-topic">
                    <h4><?php echo $post-> name ?></h4>
                  </div>
                  <div class="s-description">
                    <div class="image">
                    
                    </div>
                    <div class="info">
                      <p></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $post-> offerPrice; ?></td>
              <td><?php echo $post-> offerDescription; ?></td>
              <td><?php echo $post-> offerStatus; ?></td>
              
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