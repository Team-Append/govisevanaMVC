<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/navStyles.css" />
        <!--Boxicons CDN Links-->
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        


      <!-- <style>
@media screen and (max-width: 600px) {
  .nav.middle a:not(:first-child) {display: none;}
  .nav.middle a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .nav.middle.responsive .icon {
    position: absolute;
    right: 0;
    bottom:0;
  }
  .nav.middle.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>  -->

</head>
<body>
    <div class="nav">
    <div class="logo">
            <h1>GOVISEVANA</h1>
            <div class="select">
                <span class="lan">English | සිංහල | தமிழ் </span>
            </div>
        </div>
        <div class="middle" id ="mid" >
        <ul>
            <li class="right"><a href="<?php echo URLROOT;?>/pages/index">Home</a></li>
            <?php if(isFarmerLoggedIn()) : ?>
                <li class="right"><a href="<?php echo URLROOT;?>/farmers/dashboard">Dashboard</a></li>
            <?php endif;?>
            <?php if(isBuyerLoggedIn()) : ?>
                <li class="right"><a href="<?php echo URLROOT;?>/buyers/dashboard">Dashboard</a></li>
            <?php endif;?>
            <?php if(isModLoggedIn()) : ?>
                <li class="right"><a href="<?php echo URLROOT;?>/Moderators/dashboard">Dashboard</a></li>
            <?php endif;?>
            <?php if(isAdminLoggedIn()) : ?>
                <li class="right"><a href="<?php echo URLROOT;?>/admins/dashboard">Dashboard</a></li>
            <?php endif;?>
            <?php if(isDeliveryPersonLoggedIn()) : ?>
                <li class="right"><a href="<?php echo URLROOT;?>/deliveryPersons/dashboard">Dashboard</a></li>
            <?php endif;?>
            <li class="right"><a href="<?php echo URLROOT;?>/Stocks/allStock">Stocks</a></li>
            <li class="right"><a href="index.html">Orders</a></li>
            <li class="right"><a href="contact.html">Contact Us</a></li>
            <li class="right"><a href="international.html">Help</a></li>

            


            <form method = "post">
                <li class="search">
                    <input type="text" placeholder="Search.." name="search" >
                    <input type="submit" name="submit">
                </li>
            </form>
            
            </ul>
        </div>
        
        <div class="nav-right">
       <!-- <a  style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a> -->
                <div class="notify">
                    <i class='bx bxs-bell'></i>
                </div>
            <div class="name">
            <?php if(isBuyerLoggedIn()){ ?>
                    <a href="<?php echo URLROOT;?>/buyers/Logout">Log out</a>
                <?php }else if (isFarmerLoggedIn()){ ?>
                    <a href="<?php echo URLROOT;?>/farmers/Logout">Log out</a>
                <?php }else if(isAdminLoggedIn()){ ?>
                    <a href="<?php echo URLROOT;?>/admins/logout">Log out</a>
                <?php }else if(isDeliveryPersonLoggedIn()){ ?>
                    <a href="<?php echo URLROOT;?>/deliveryPersons/logout">Log out</a>
                <?php }else if(isModLoggedIn()){ ?>
                    <a href="<?php echo URLROOT;?>/moderators/logout">Log out</a>
                <?php }else {?>
                    <a href="<?php echo URLROOT;?>/pages/accountType">Log in</a>
                    <?php }?>
            </div>
        </div>
    </div>
</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=govisevana",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM catagory,stock WHERE catagory.catName = '$str' and stock.catID = catagory.catID");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Title</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo $row->title; ?></td>
				<td><?php echo $row->description;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>
<!--
<script>
function myFunction() {
  
  var x = document.getElementById("mid");
  if(x === null){
    x = document.getElementById("midresponsive");
  }
 
 if (x.id === "mid") {
    
    x.id = "midresponsive";
  } else {
    x.id = "mid";
  }
}
</script>
-->
