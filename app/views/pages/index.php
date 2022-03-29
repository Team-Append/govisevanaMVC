<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/newStyle.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/footerStyles.css" />
    <title>Home</title>
    <style>
        .contactUs .contact-img{
            background-image: url("<?php echo URLROOT; ?>/img/landing1.jpg");
        }
        .instagram-box{
            background: url("<?php echo URLROOT; ?>/img/img-pro-03.jpg") no-repeat center center;
            background-size: auto auto;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -ms-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
       

       
    </style>
</head>
<body>
    <div class="nav">
    <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="header">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="<?php echo URLROOT; ?>/img/landing1.jpg" style="width:100%">
                <center><div class="text" style="color: black;">
                    <div class="hello" >Hello!</div>
                    <div class="welcome"><strong>Welcome To <br> GOVISEVANA</strong></div>
                    <div class="para"><p >See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p></div>
                    <div class="btn">
                    <a href="<?php echo URLROOT;?>/stocks/allStock">
                        <button type="button">SHOP NOW</button>
                    </a>
                    </div>
                        
                </div></center>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="<?php echo URLROOT; ?>/img/landing2.jpg" style="width:100%">
                <div class="text" style="color: black;">
                <div class="hello" >Hello!</div>
                    <div class="welcome"><strong>Explore <br> The Farmers World</strong></div>
                    <div class="para"><p >See how your users experience your website in realtime or view <br> trends to see any changes in performance over time.</p></div>
                    <div class="btn">
                    <a href="<?php echo URLROOT;?>/stocks/allStock">
                        <button type="button">SHOP NOW</button>
                    </a>
                </div>
                </div>
            </div>
            
            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="<?php echo URLROOT; ?>/img/landing3.jpg" style="width:100%">
                <div class="text" style="color: black;">
                <div class="hello" >More products coming Soon!</div>
                </div>
            </div>

        </div>
        <br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
    </div>
    <div class="aboutUs">
        <div class="image">
            <img src="<?php echo URLROOT; ?>/img/about.jpeg" alt="about us image">
        </div>
        <div class="details">
            <div class="title-all">
                <h1>ABOUT US</h1>
            </div>
            <div class="des">
                 We believe that technology should connect people together, shrink the world, empower individuals and small businesses while lowering costs and inefficiencies, and help you stay safe during the pandemic.<br>Well, what exactly does that imply? We use our platform to connect farmers, buyers, and delivery people to the supply chain, allowing them to store and share their products with the community.
            </div>
            <div class="button">
                    <!-- <div class="btn from-top">READ ME</div> -->
                    <span><a href="<?php echo URLROOT;?>/pages/about"></a></span>
                </a>
            </div>

        </div>
    </div>
    <div class="fnv">
        <div class="products-box">
            <div class="container">
                <div class="row">
                    <div class="">
                        <div class="title-all text-center">
                            <h1>Fruits & Vegetables</h1>
                            <p>Convenient market place at your fingertip !</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                        <div class="special-menu text-center"><center>
                            <div class="button-group filter-button-group">
                                <button class="active" data-filter="*">All</button>
                                <button data-filter=".top-featured">Top featured</button>
                                <button data-filter=".best-seller">Best seller</button>
                            </div></center>
                        </div>
                    </div>
                </div>

                <div class="row-special-list" style="justify-content: center;">
                    <?php $count = 0; ?>
                    <?php foreach($data['posts'] as $post) { ?>
                    <div class="special-grid ">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                    <p class="new">New</p>
                                </div>
                                <img src="<?php echo URLROOT; ?>/img/<?php echo $post -> image ?>" class="img-fluid" alt="Image">
                                <div class="mask-icon">
                                    <ul>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                    </ul>
                                    <a class="cart" href="<?php echo URLROOT; ?>/stocks/viewStock?stockID=<?php echo  $post -> stockID;?>" style="width: 100%;">View Stock</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4><?php echo $post -> title ?></h4>
                                <h5> <?php echo $post -> fixedPrice ?> RS</h5>
                            </div>
                        </div>
                    </div>
                    <?php $count++;
                    if($count>=4) break;
                }?>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- latest posts -->
    <div class="latest">
    <div class="latest-blog">
        <div class="container">
            <div class="f-row">
                <div class=""><center>
                    <div class="title-all text-center">
                        <h1>Top catagories</h1>
                        <p>these are the top catagories</p>
                    </div></center>
                </div>
            </div>
            <div class="row">
               <?php foreach($data['cats'] as $cat){?>
                    <div class="blog-box">
                        <div class="blog-img">
                            <img class="img-fluid" src="<?php echo URLROOT; ?>/img/<?php if($cat -> image != ''){ echo $cat -> image;  } else echo 'blog-img.jpg' ?>" alt="" width="500px" height ="500px"/>
                        </div>
                        <div class="blog-content">
                            <div class="title-blog">
                                <h3 style="text-align: center;"><?php echo $cat -> catName; ?></h3>
                                <p><?php echo $cat -> catDescription; ?></p>
                            </div>
                            <ul class="option-blog">
                                <li><a href="<?php echo URLROOT; ?>/stocks/allStock/?catID=<?php echo  $cat -> catID;?>"><i class="">Visit</i></a></li>

                            </ul>
                        </div>
                    </div>
                <?php }?>

                    
                
            </div>
        </div>
    </div>
    <!-- End Blog  -->
    </div>

    <!-- reviews -->
    <div class="reviews">
            
    </div>
    <!-- contact us -->
    <div class="contactUs" style ="<?php echo URLROOT; ?>/img/contact.jpg;">
        
        <div class="contact-img title-all">
        <form action="/action_page.php" class="container">
            <center><h3>We Are Here to</h3></center>
            <h1>Help You!</h1>
            <!-- <label for="email"><b>Name</b></label> -->
            <input type="text" placeholder="Enter Your Name" name="email" required><br>

            <!-- <label for="email"><b>Email</b></label> -->
            <input type="text" placeholder="Enter Email" name="email" required><br>

            <!-- <label for="psw"><b>Contact Number</b></label> -->
            <input type="text" placeholder="Enter Contact Number" name="tpno" required><br>

            <!-- <label for="description">Message</label><br> -->
                <textarea rows="4" cols="35" name="comment" form="usrform" placeholder="Add message here..."></textarea><br>

                <button class="custom-btn btn-5"><span>SEND</span></button>
            <!-- <button type="submit" class="btn">Submit</button> -->
        </form>
        </div>
    </div>
    <!-- gallery -->
    <div class="gallery">
    <div class="instagram-box" style="<?php echo URLROOT; ?>/img/ins-bg.jpg">
        <div class="main-instagram owl-carousel owl-theme">
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo URLROOT; ?>/img/instagram-img-01.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo URLROOT; ?>/img/instagram-img-02.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo URLROOT; ?>/img/instagram-img-03.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="<?php echo URLROOT; ?>/img/instagram-img-04.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <!-- <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-06.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-07.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div> -->
            <!-- <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-08.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-09.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/instagram-img-05.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    </div>
    <div class="footer">
        <?php include_once(APPROOT.'/views/includes/footer.php'); ?>
    </div>
    <!-- Automatic Slideshow -->
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    </script>


</body>
</html>