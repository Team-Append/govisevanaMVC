<?php if(isFarmerLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boxicons CDN Links-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/myStockStyles.css" />
    <link rel="stylesheet" href="myStockstyles.css"/>
    <title>my stocks</title>
</head>
<body>
    <div class="nav">
        <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>
    <div class="mystock-content">
        <div class="left-side">
            <div class="history">
            <table class="side-table">
                    <tr> 
                        <th> <h2> Stock History</h2> </th>
                    </tr>  
                    <tr>
                        <td> <p> Number of orders Completed : 10 <p> <hr></td> 
                    </tr> 
                    <tr>
                        <td> <p> Total Number of Posts : 6 <p> <hr>  </td>
                    </tr>
                    <tr>
                        <td> <p> Number of Posts Approved : 5 <p> <hr>  </td>
                    </tr>
                    <tr>
                        <td> <p> Number of Posts Rejected : 1 <p> <hr> </td>
                    </tr>
                    <tr>
                        <td> <p> Number of Reports : 0 <p> <hr>  </td>
                    </tr> 
                </table>    
            </div>
        </div>
        <div class="right-side">
            <div class="topic">
                <h2>My Stocks </h2>
            </div>
            <div class="posts-list">
                <?php $count = 0; ?>

                        <!-- checkk -->
                        <?php  foreach($data['posts'] as $post){ ?>
                            <?php if($count%3 == 0){ echo "<div class=\"row\">";}?>   
                            <div class="column">
                                
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
                            </div>
                            

                        <?php $count++;} ?>
                        <?php if(($count-1)%3 == 0){ echo "</div>";}?>

            </div>
        </div>
    </div>
    
</body>
</html>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>