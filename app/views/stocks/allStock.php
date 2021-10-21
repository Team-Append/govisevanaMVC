
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/styleStockV.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    <div class="side">
      Side bar
    </div>
    <?php foreach($data['cats'] as $cat){?>
    <div class="detail">
      <div class="dtopic">
        <h1><?php echo $cat->catName;?></h1>
      </div>
      <?php foreach($data['cats'] as $cat){?>
        <div class="dlist">
          <div class="d1">
            <div class="posts-list">
                  <div class="column">
                    <div class="card">
                        <div class="stock-img">
                        <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock" style="width:100%">
                            <!-- <img class="stock-img-1" src="/img/<?php echo $post -> image ?>" alt="Stock" style="width:100%"/> -->
                        </div>
                        <div class="container">
                            <div class="line-1">
                                <div class="text1">
                                    <p>KG</p>
                                </div>
                                <div class="text2">
                                    <p>Rs.300</p>
                                </div>
                            </div>
                            <div class="line-2">
                                <div class="text1">
                                    <p class="title">Farmer : Kamal</p>
                                </div>
                                <div class="text2">
                                    <i class='bx bx-star'></i>
                                    <i class='bx bx-star'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
          </div>  
        </div>
      <?php }?>
    </div>
    <?php }?>
    
      

  </body>
</html>
