
<html>
<head>
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/styleMain.css">
    <link rel="stylesheet" href="<?php echo URLROOT;?>/css/style.css">
</head>

<body>
<?php

            include_once(APPROOT.'/views/includes/navigation.php');
        ?> 
<div class="select-title">
  <p><b>I am</b></p>
</div>

<div class="selectTiles">

<div class="split left">
<button class="btn">
    <a href="<?php echo URLROOT;?>/buyers/login">
  <div class="centered">
    <img src="<?php echo URLROOT;?>/img/icons/buyer.png" alt="buyer">
    <h2>A buyer</h2>
  </div>
</a>
</button>
</div>


<div class="split right">
  <button class="btn">
    <a href="createAccount.php?cat=delivery">
  <div class="centered">
    <img src="<?php echo URLROOT;?>/img/icons/delivery.png" alt="deliveryP">
    <h2>A delivery person</h2>
  </div>
</a>
  </button>
</div>


<div class="split mid">

  <button class="btn">
<a href="<?php echo URLROOT;?>/farmers/login">
  <div class="centered">
    <img src="<?php echo URLROOT;?>/img/icons/farmer.png" alt="farmer">
    <h2>A farmer</h2>
  </div>
  </a>
  </button>

</div>

</div>

</body>
</html>
