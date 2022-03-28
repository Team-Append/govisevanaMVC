<?php if(isDeliveryPersonLoggedIn()){ ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My Schedule</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/mySchedules.css" />
    
  </head>
  <body>
    <div class="nav">
    
    </div>

    
    <div class="side">
      Side bar
    </div>
    <div class="detail">
      <div class="dtopic">
        <h1>My Schedules</h1>
      </div>
      <div class="dlist">
      <?php for ($i = 0; $i <= 3; $i++){ ?>
        <div class="d1">
          <div class="content">
            <div class="top-line">
              <div class="name">
                <h3>Thilakarathne Dilshan</h3>
              </div>
              <div class="budget">
                Fee | Rs. <hb>3000.00</hb>
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
                  <input type="submit" value="View">
                </div>
            </div>
          
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>
