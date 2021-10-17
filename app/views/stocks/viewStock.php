<!DOCTYPE html>
<html>
    <head>
        <title>Select Stock</title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/stock.css" />

    </head>

    <body style="font-family: 'Poppins', sans-serif; ">
       <div class="row">
        <!-- Left column for Stock Image -->
            <div class="column left">
            <img src="<?php echo URLROOT; ?>/img/carrot.jpg" alt="Stock Image" width="100%" height="100%">
            </div>

        <!-- Middle column for Stock Information -->
            <div class="column middle">
            <table align="center" class="stock-info">
            <tr>
                <td><h2>Carrot 20 KG</h2></td>
                <td><h2 align="right">Rs.3000.00</h2></td>
            </tr>
            <tr align="center" style="height:200px">
                <td colspan='2'>
                    <div id="stock-description">
                        <p>description</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="txt" id="qty" name="qty" value="Qty" required></td>
                <td><input type="text" class="txt" id="bid" name="bid" value="Minimum Bid Rs.2800" required></td>
            </tr>
            <tr>
                <td><input type="button" class="btn" value="Add to Cart"></td>
                <td><input type="button" class="btn" value="Place a Bid"></td>
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
                        <h2>Thilina Peduruhewa</h2>
                        <hr>
                    </div>
                    <table id="farmer-card-stats">
                        <tbody>
                            <tr>
                                <td class="stats-desc">address</td>
                                <td class="stat">50</td>
                            </tr>
                            <tr>
                                <td class="stats-desc">telephone number</td>
                                <td class="stat">231</td>
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

                <div class="mySlides">
                    <h1>Kamal</h1>
                    <p>Rating : </p>
                    <div class="review">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum et, nesciunt natus officia qui sapiente quam blanditiis hic praesentium quis eaque perferendis similique culpa maiores quaerat quia. Ipsum, explicabo alias. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas reiciendis voluptatum ipsa consectetur dolor optio, 
                    </div>  
                </div>
        
                <div class="mySlides">
                    <h1>Nimal</h1>
                    <p>Rating : </p>
                    <div class="review">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum et, nesciunt natus officia qui sapiente quam blanditiis hic praesentium quis eaque perferendis similique culpa maiores quaerat quia. Ipsum, explicabo alias. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas reiciendis voluptatum ipsa consectetur dolor optio, mollitia odio architecto ducimus possimus, voluptatem maiores dolore repellendus sapiente magni autem! Quidem, fugiat nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, nemo deleniti dolorum blanditiis illo, cum vitae voluptatibus in eligendi suscipit facilis. Expedita, porro tenetur saepe corrupti obcaecati eum exercitationem quam. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae tempore distinctio nisi, ea laboriosam nulla, deleniti, quo quae voluptatum accusamus quia. Molestiae nihil corrupti veritatis excepturi quae at dolores minus.
                    </div>  
                </div>
        
                <div class="mySlides">
                    <h1>Kamal</h1>
                    <p>Rating : </p>
                    <div class="review">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum et, nesciunt natus officia qui sapiente quam blanditiis hic praesentium quis eaque perferendis similique culpa maiores quaerat quia. Ipsum, explicabo alias. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas reiciendis voluptatum ipsa consectetur dolor optio, mollitia odio architecto ducimus possimus, voluptatem maiores dolore repellendus sapiente magni autem! Quidem, fugiat nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, nemo deleniti dolorum blanditiis illo, cum vitae voluptatibus in eligendi suscipit facilis. 
                    </div> 
                </div>
        
                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>
        
            </div>
        
            <div class="dot-container">
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

        <!-- /*Stock Card Section*/ -->
        <h2> Other Stock from the Farmer </h2>
        <table class="stock-rows">
         <tr>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
         </tr>
        </table>
        <br> <br> <br> 

        <h2> Stock that might interest you </h2>
        <table class="stock-rows">
         <tr>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
            <td width="20%">
                <div class="card">
                    <div class="stock-img">
                    <img class="stock-img-1" src="images/carrot.jpg" alt="Stock" style="width:100%">
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
            </td>
         </tr>
        </table> 
   
    </body>
</html> 