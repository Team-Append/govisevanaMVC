<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/adminContactStyles.css" />
    <title>Admin Contacts</title>
</head>
<body>
    <div class="nav">

    </div>
    <div class="ra-content">
        <div class="topic">
            <span class="main-topic">Admin Contacts</span>
            <img src="<?php echo URLROOT; ?>/img/bell-ring.png" alt="notification-icon"><br>
            <hr>
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
                Budget | Rs. <hb>3000.00</hb>
              </div>
              <div class="cat">
                Category | <hc>Carrot</hc>
              </div>
            </div>
            
            <div class="description">
              dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd<br>ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
            </div>
            <div class="bottom-line">
                <div class="date">
                  <p>Expect delivery date : 22/03/2021</p>
                </div>
                <div class="button">
                  <input type="submit" value="Contact">
                </div>
            </div>
          
          </div>
        </div>
        <?php } ?>
      </div>
            
        </div>
    </div>
    <div class="footer">
        <hr>
        <div class="copyright">
            <p>Copyright © govisewana , All Right Reserved. </p>
        </div>

    </div>
    
</body>
</html>