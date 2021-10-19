<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/viewReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" type="text/css">
  </head>
  <body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    
    <div class="side">
      Side bar
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>Buyer requests</h1>
      </div>
      <div class="dlist">
      <?php foreach ($data['posts'] as $post){ ?>
        <div class="d1">
          <div class="content">
            <div class="top-line">
              <div class="name">
                <h3><?php echo $post->name;?></h3>
              </div>
              <div class="budget">
                Budget | Rs. <hb>3000.00</hb>
              </div>
              <div class="cat">
                Category | <hc><?php echo $post->reqCatagory;?></hc>
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
                  <a href="<?php echo URLROOT;?>/Offers/addOffer?RID=<?php echo $post->RID;?>">
                  <input type="button" value="Submit Offer">
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
