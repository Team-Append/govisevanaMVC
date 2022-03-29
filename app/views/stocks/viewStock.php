<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Stock</title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stock.css" />
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <style>
            .searchForm{
            position: absolute;
            top: 13px;
            right: 50px;
        }
        .searchForm .searchbutton{
            border-radius: 4px;
            height: 40px;
            width: 40px;
        }
        </style>
    </head>

    <body style="font-family: 'Poppins', sans-serif; ">
    <?php 
            include_once(APPROOT.'/views/includes/navigation.php');
        ?>
       <div class="row">
        <!-- Left column for Stock Image -->
            <div class="column left">
            <img src="<?php echo URLROOT; ?>/img/<?php echo $data['posts']->stockImage;?>" alt="Stock Image" width="100%" height="100%">
            </div>

        <!-- Middle column for Stock Information -->
            <div class="column middle">
            <table align="left" class="stock-info">
            <tr>
                <td colspan="2"><h2 align="left"><?php echo $data['posts']->title;?></h2> <h2 id="qty"> Quantitiy: <?php echo $data['posts']->qty;?></h2></td>
                
            </tr>
            <tr>
            <td colspan="2"><h2 align="left">Rs.<?php echo $data['posts']->fixedPrice;?></h2></td>
            </tr>
            <tr align="center" style="height:200px">
                <td colspan='2'>
                    <div id="stock-description">
                        <p style="text-align: left;"><?php echo $data['posts']->description;?></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <form action="" method="POST" onsubmit="checkqty()">
                        <input type="text" class="txt" id="orderQty" name="qty" placeholder="Qty" required>
                        <input type="submit" id="confirmOrder" class="btn" value="buy above quantitiy">
                    </form>
                </td>
                
            </tr>
            <tr>
                
                <td>
                    <form action="" method="POST" onsubmit="checkqty()">
                        <input type="hidden" id="orderQty" name="qty" value="<?php echo $data['posts']->qty;?>" />
                        <input type="submit" class="btn" value="buy full stock" ></td>
                    </form>   
            </tr>
            </table> 
            </div>

        <!-- Right Column for Farmer Card -->
            <div class="column right">
                <div id="farmer-info-card">
                    <div class="profile-upper">
                        <div class = "profile-pic">
                            <img src="pp.jpg" alt="">
                        </div>
                        <h1>Farmer</h1>
                        <h2><?php echo $data['posts']->name;?></h2>
                        <hr>
                    </div>
                    <table id="farmer-card-stats">
                        <tbody>
                            <tr>
                                <td class="stats-desc">Address</td>
                                <td class="stat"><?php echo $data['posts']->address;?></td>
                            </tr>
                            <tr>
                                <td class="stats-desc">Telephone Number</td>
                                <td class="stat"><?php echo $data['posts']->tpno;?></td>
                            </tr>
                            <tr>
                                <td class="stats-desc">Orders completed</td>
                                <td class="stat">12</td>
                            </tr>
                            <tr>
                                <td class="stats-desc rating">Rating</td>
                                <td class="stat"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
        <br><br><br>
        <!-- slide show Section-->
        <h2> Farmer's Reviews </h1>

            <div class="slideshow-container">
            <?php foreach($data['reviews'] as $review){?>
                <div class="mySlides">
                    
                    <h1><?php echo $review -> name?></h1>
                    <p>Rating : <?php echo $review -> rating?></p>
                    <div class="review">
                        <?php echo $review -> description?>
                    </div>  
                </div>
            <?php } ?>
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
        
            </div>
        
            <div class="dot-container">
            <?php $count = 1; ?>    
            <?php foreach($data['reviews'] as $review){?>
                <span class="dot" onclick="currentSlide(<?php $count++ ?>)"></span>
            <?php } ?>    
            </div>
            <script>
                var slideIndex = 1;
                showSlides(slideIndex);
        
                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }
        
                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }
        
                function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex - 1].style.display = "block";
                    dots[slideIndex - 1].className += " active";
                }
            </script>
        
        <br> <br> <br> 

        <!-- Stock Card Section -->
        <h2> Other Stock from the Farmer </h2>
        <div class="farmer-stock">
       
         
      <?php foreach($data['farmerPosts'] as $stock){?>
        
        <a href="<?php echo URLROOT; ?>/stocks/viewStock?stockID=<?php echo  $stock -> stockID;?>">
        <div class="dlist">
          <div class="d1">
            <div class="posts-list">
                  <div class="column">
                    <div class="card">
                        <div class="stock-img">
                        <!-- <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock" style="width:100%"> -->
                            <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/<?php echo $stock -> image ?>" alt="Stock" style="width:100%"/>
                        </div>
                        <div class="container">
                            <div class="line-1">
                                <div class="text1">
                                <p><?php echo $stock->title ;?> <?php echo $stock ->qty;?>KG</p>
                                </div>
                                <div class="text2">
                                <p>Rs.<?php echo $stock->fixedPrice;?></p>
                                </div>
                            </div>
                            <div class="line-2">
                                <div class="text1">
                                    <p class="title">Farmer : <?php echo $stock->name;?></p>
                                </div>

                               
                                
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
            
            <script>
            function checkqty(){

                if(document.getElementById("orderQty").value > <?php echo $data['posts']->qty; ?>){
                        window.alert("the ordered quantity is greater than the available stock");
                       
                }
            }
            </script>
   
    </body>
</html> 