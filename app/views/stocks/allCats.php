
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stock.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleStockV.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" />
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footerStyles.css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
  <div style="position: fixed; width: 100%; z-index: 2;">
    <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
  </div>
  <div class="sidenav">
    
    <?php foreach($data['catsList'] as $cat){?>
      <a href="<?php echo URLROOT; ?>/stocks/allStock?catID=<?php echo  $cat -> catID;?>"><?php echo $cat->catName;?></a>
    <?php } ?>
</div>

<div class="main">
  
<div class="detail">
<h2 >Select the catagory you want to shop in</h2>
    <a href="<?php echo URLROOT; ?>/stocks/allStock/">
    <div class="dlist">
              <div class="d1">
                <div class="posts-list">
                      <div class="column">
                        <div class="card" style="height: 300px;">
                        <div class="stock-img">
                            <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock" style="width:100%">
                                <!-- <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/<?php echo $stock -> image ?>" alt="Stock" style="width:100%"/> -->
                            </div>
                            <div class="container">
                                <div class="line-1">
                                    <div class="text1">
                                    <p style="font-size: 30px;">All Stock</p>
                                    </div>
                                    
                                </div>
                                <div class="line-2">
                                  

                                    
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
              </div>  
            </div>
    </a>
    <?php foreach($data['cats'] as $cat){?>
    
      <a href="<?php echo URLROOT; ?>/stocks/allStock/?catID=<?php echo  $cat -> catID;?>">
        <div class="dlist">
          <div class="d1">
            <div class="posts-list">
                  <div class="column">
                    <div class="card" style="height: 300px;">
                    <div class="stock-img">
                        <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock" style="width:100%">
                            <!-- <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/<?php echo $stock -> image ?>" alt="Stock" style="width:100%"/> -->
                        </div>
                        <div class="container">
                            <div class="line-1">
                                <div class="text1">
                                <p style="font-size: 30px;"><?php echo $cat ->catName;?></p>
                                </div>
                                
                            </div>
                            <div class="line-2">
                               

                                
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
          </div>  
        </div>
        </a>

    
    <?php }?>
    </div>
    <div class="footer">
        <?php include_once(APPROOT.'/views/includes/footer.php'); ?>
    </div>
      
    </div>
  </body>
</html>
