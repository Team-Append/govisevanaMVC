<?php if(isBuyerLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Requests</title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/viewReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    

    <div class="detail" style="width: 100%;">
      <div class="dtopic">
        <h1>My Requests</h1>
      </div>
      <div class="dlist">
      <?php foreach ($data['posts'] as $post){ ?>
        <div class="d1" style="margin: auto;">
          <div class="content">
            <div class="top-line">
              
              <div class="budget">
                Budget | Rs. <hb><?php echo $post->budget;?></hb>
              </div>
              <div class="cat">
                Category | <hc><?php echo $post->catName;?></hc>
              </div>
              <div class="budget">
                Status | <hb><?php echo $post->reqStatus;?></hb>
              </div>
            </div>
            
            <div class="description">
            <?php echo $post->reqDescription;?>
            </div>
            <div class="bottom-line">
                <div class="date">
                  <p>Expect delivery date : <?php echo $post->expectedDate;?></p>
                </div>
                <div class="button">
                  <a href="<?php echo URLROOT;?>/Buyers/viewOffers?RID=<?php echo $post->RID;?>">
                  <input type="button" value="View Offers">
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
