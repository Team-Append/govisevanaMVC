<?php if(isFarmerLoggedIn()){ ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boxicons CDN Links-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=" <?php echo URLROOT; ?> /css/viewReqStyles.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/myStockStyles.css" />
    <link rel="stylesheet" href="myStockstyles.css"/>
    <title>My stocks</title>
</head>
<body>
    <div class="nav">
      <?php include_once(APPROOT.'/views/includes/navigation.php'); ?>
    </div>

    <div class="detail">
      <div class="dtopic">
        <h1>My Stocks</h1>
      </div>
      <div class="dcontent">
        <table class="main">
          <thead class="ttopic">
            <td>StockID</td>
            <td>Image</td>
            <td>Title</td>
            <td>Description</td>
            <td>Harvest Date</td>
            <td>CatID</td>
            <td>Quantity(Unit Price)</td>
            <td>Status</td>
            <td></td>
            <td></td>
           
            
            
          </thead>
          <?php foreach ($data['posts'] as $post){ ?>
          <tbody>
            <tr class="rw">
            <td><?php echo $post->stockID ;?></td>
              <td><img class="stock-img-1" src="<?php echo URLROOT; ?>/img/<?php echo $post -> image ?>" alt="Stock" style="width:50px; height:50px;"/></td>
              <td><?php echo $post->title;?></td>
              <td class="col-description">
                <div class="s-details">
                    <div class="info">
                      <p><?php echo $post->description;?></p>
                    </div>
                  </div>
                </div>
              </td>
              <td><?php echo $post->harvestDate;?></td>
              <td><?php echo $post->catID;?></td>
              <td><?php echo $post ->qty;?></td>
              <td><?php echo $post ->stockStatus;?></td>

              
              <td>
              <div class="proceed-button">
                <a href="<?php echo URLROOT;?>/Stock/editStock?stockID=<?php echo $post->stockID;?>"><input class="btn-proceed" type="button" value="update"></a>
              </div>
              
            </td>
            <td>
            <div class="proceed-button">

              <form action="">
                  
                     <button onclick="myFunction(<?php echo $post->stockID?>)" type="button" name="button">Delete</button></a></td>
               
            </div>
            </td>
              
             
              
            </tr>
            <tr>
            </tr>
            
          </tbody>
          
          <?php } ?>
          
        </table>
        
      </div>
      <br><br>
      
    </div>
  </body>
</html>

<script>
function myFunction(stockID) {
  //var txt;
  if (confirm("Are you sure want to delete!")) {
    var newUrl = "<?php echo URLROOT; ?>/stocks/deleteStock?stockID="+stockID;
        document.location.href = newUrl;
  } else {
    //txt = "You pressed Cancel!";
  }
 // document.getElementById("demo").innerHTML = txt;
}
</script>

<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>

