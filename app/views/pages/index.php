
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css" />
    <!--Boxicons CDN Links-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>"Govi Sevana"</title>
</head>
<body>
    <!--navbar-->
        <?php 
            include_once(APPROOT.'/views/includes/navigation.php');
        ?>
    <?php echo $_SESSION['email'];?>
    <div class="landing_page">
        

        <!--sidebar -->
        <div class="left">
        <?php 
            include_once(APPROOT.'/views/includes/sidebar.php');
        ?>
        </div>
        <!--end of side bar-->
        <div class="right">
        <?php if(isBuyerLoggedIn()){?>
        <div class="topic">
            <span class="main-topic">Welcome <?php echo $_SESSION['name'] ?></span>
        </div>
        <?php } ?>
       <!--slideshow images-->
        <div class ="slideshow">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <img class="land_image" src="<?php echo URLROOT;?>/img/landing1.jpg" style="width:100%">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <img class="land_image" src="<?php echo URLROOT;?>/img/landing2.jpg" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <img class="land_image" src="<?php echo URLROOT;?>/img/landing3.jpg" style="width:100%">
            <div class="text">Caption Three</div>
            </div>
            <!-- slideshow arrows -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
        <br>

        <div style="text-align:center" class="dot-set">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
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
                if (n > slides.length) {slideIndex = 1}    
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
            }
        </script>
    </div>
    <!--end of slideshow-->

<!--stock from best selling farmers text-->
<div class="topic">
        <span class="main-topic">Stocks From Best Selling Farmers</span>
    </div>

    <!--stock from best selling farmers-->
    <div class="farmer-stock">
        <!--row 1 start-->
        <?php $count = 0; ?>

                        <!-- checkk -->
                        <?php  foreach($data['posts'] as $post){ ?>
                            <?php if($count%3 == 0){ echo "<div class=\"row\">";}?>   
                            <div class="column">
                                <a href="<?php echo URLROOT; ?>/stocks/viewStock?stockID=<?php echo  $post -> stockID;?>">
                                <div class="card">
                                    <div class="stock-img">
                                        <img class="stock-img-1" src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock" style="width:100%">
                                    </div>
                                    <div class="container">
                                        <div class="line-1">
                                            <div class="text1">
                                                <p><?php echo $post->title ;?> <?php echo $post ->qty;?>KG</p>
                                            </div>
                                            <div class="text2">
                                                <p>Rs.<?php echo $post->fixedPrice;?></p>
                                            </div>
                                        </div>
                                        <div class="line-2">
                                            <div class="text1">
                                                <p class="title">Farmer : <?php echo  $_SESSION['name'];?></p>
                                            </div>
                                            <div class="text2">
                                                <i class='bx bx-star'></i>
                                                <i class='bx bx-star'></i>
                                            </div>
                                        </div>    
                                    </div> 
                                </div>
                                </a>
                            
                        </div>
                            

                        <?php $count++;} ?>
                        <?php if(($count-1)%3 == 0 || $count-1==0 || $count-1 == 1 || $count-1 == 2){ echo "</div>";}?>
            
        <!--end of a row1-->
       
    <!--For you text-->
    <br>
    <br>
    <div class="topic">
        <span class="main-topic">FOR YOU</span>
    </div>
<!--for you stock posts-->
      <!--row 1 start-->
      <?php for( $j = 0; $j<2; $j++ ){ ?>
        <div class="row">
            
                <?php for( $i = 0; $i<4; $i++ ){ ?>
                <div class="column">
                <a href="stockManagement/SelectStock.php" style="text-decoration:none">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="<?php echo URLROOT;?>/img/carrot.jpg" alt="Jane" style="width:100%">
                    </div>
                    <div class="container">
                        <div class="line-1">
                            <div class="text1">
                                <p>Carrot 20KG</p>
                            </div>
                            <div class="text2">
                                <p>Rs.3000.00</p>
                            </div>
                        </div>
                        <div class="line-2">
                            <div class="text1">
                            <p class="title">Farmer : Nimal</p>
                            </div>
                            <div class="text2">
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
                </a>
                <?php } ?>
                
                <!--end of the card1-->
            </div>
            <?php } ?>
    <!--end of for you stocks-->
    </div><!--end of right div-->
    <script>
                let arr = document.querySelectorAll(".arrow");
                for (var i=0;i<arr.length;i++){
                    arr[i].addeventListner("click", (e)=>{
                        let arrParent = e.target.parentElement.parentElement;
                        console.log(arrParent);
                        arrParent.classList.toggle("showMenu");
                    });
                }
    </script>

</body>

</html>