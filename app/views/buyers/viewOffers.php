<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Offers</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/viewReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    
   
    <div class="detail" style="width: 100%;">
      <div class="dtopic">
        <h1>offers For Request</h1>
      </div>
      <div class="dlist">
      <?php foreach ($data['posts'] as $post){ ?>
        <div class="d1" style="margin: auto;">
          <div class="content">
            <div class="top-line">
              
              <div class="budget">
                Farmer Name |  <hb><?php echo $post->name;?></hb>
              </div>
              <div class="cat">
                Address | <hc><?php echo $post->address;?></hc>
              </div>
              <div class="budget">
                Telephone number | <hb><?php echo $post->tpno;?></hb>
              </div>
            </div>
            
            <div class="description">
            <?php echo $post->offerDescription;?>
            </div>
            <div class="bottom-line">
                <div class="date">
                  <p>offer price : <?php echo $post->offerPrice;?></p>
                </div>
                <div class="button">
                  <a href="<?php echo URLROOT?>/buyers/offerORderConfirmation?offerID=<?php echo $post -> offerID?>">
                    <input type="button" value="accept">
                  </a>
                  <a href="">
                  <input type="button" value="reject">
                  </a>
                </div>
            </div>
          
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="footer">
      
    </div>
  </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
