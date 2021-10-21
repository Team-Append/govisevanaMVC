<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?> /css/sendOfferStyles.css" />
    <title>Offers Sent</title>
</head>
<body>
    <div class="nav">
    <?php

include_once(APPROOT.'/views/includes/navigation.php');
?> 
    </div>
    <div class="offer-content">
        <div class="topic">
            <span class="main-topic">Send Offer</span>
        </div>
        <div class="content">
            <div class="stock-details">
                <div class="line-1">
                    <div class="col-1">
                        <p>Thilakaratne Dilshan</p>
                    </div>
                    <div class="col-2">
                        <p>Budget Rs.30,000</p>
                    </div>
                    <div class="col-3">
                        <p>Category | Carrot</p>
                    </div>
                </div>
                <div class="line-2">
                    <p>
                    Lorem Ipsum comes from a latin text written in 45BC by Roman statesman, lawyer, scholar, and philosopher, Marcus Tullius Cicero. The text is titled "de Finibus Bonorum et Malorum" which means "The Extremes of Good and Evil". The most common form of Lorem ipsum is the following:

Lorem ipsum dolor sit amet, consectetu
                    </p>
                </div>
                <div class="line-3">
                    <p>Expected Delivery Date | 12/09/2021</p>
                </div>
            </div>
            <div class="form">
                <form action="/action_page.php">
                    <input type="text" id="title" name="title" placeholder="Title">
                    <br>

                    <textarea rows="10" cols="50" name="comment" form="usrform">Add offer description here...</textarea><br>

                    <input type="text" id="fname" name="fixedprice" placeholder="Fixed Price..">
                    <br>

                    <input type="file" id="image" name="image" placeholder="Upload an image(optional)">
                    <br>

                    <input type="submit" value="Send Offer">
                </form>
            </div>
        </div>

    </div>
    <div class="footer">
        
    </div>
    
</body>
</html>