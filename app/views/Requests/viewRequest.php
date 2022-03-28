
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    
    <title>view Request</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/viewReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    <div class="detail">
      <div class="dtopic">
        <h1>Buyer Requests</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
              <td>Name</td>
            <td>Budget</td>
            <td>Request Description</td>
            <td>Catagory</td>
            <td>Expected Date</td>
            <td></td>
           
            
            
          </thead>
          <?php foreach ($data['posts'] as $post){ ?>
          <tbody>
            <tr class="rw">
            <td><?php echo $post->name;?></td>
              <td><?php echo $post->budget;?></td>
              <td class="col-description">
                <div class="s-details">
                    <div class="info">
                      <p><?php echo $post->reqDescription;?></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $post->catName;?></td>
              <td><?php echo $post->expectedDate;?></td>
              <td>
              <div class="myrequest-Proceed">
                  
                    <a href="<?php echo URLROOT;?>/Offers/addOffer?RID=<?php echo $post->RID;?>">
                    <input type="button" value="Submit Offer" class="btn-myreq">
                
                
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


