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
      <?php for ($i = 0; $i <= 2; $i++){ ?>
        <div class="d1">
          <div class="content">
            <div class="top-line">
              <div class="name">
                <h3>Thilakarathne Dilshan</h3>
              </div>
              <div class="budget">
                Budget | Rs. <hb>3000.00</hb>
              </div>
              <div class="cat">
                Category | <hc>Carrot</hc>
              </div>
            </div>
            
            <div class="description">
              dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd <br>ddddddddddddddddddddddddddddddddddddddddddddddddddd
              ddddddddddddddddddddd
            </div>
            <div class="bottom-line">
                <div class="date">
                  <p>Expect delivery date : 22/03/2021</p>
                </div>
                <div class="button">
                  <input type="submit" value="Submit Offer">
                </div>
            </div>
          
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
