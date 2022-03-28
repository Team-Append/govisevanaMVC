<?php if(isBuyerLoggedIn()){ ?>
<?php 

foreach($data['deliveryPersons'] as $deliveryPerson){
    echo $deliveryPerson-> name;
}

?>
<?php } else{
    header('location:' .URLROOT. '/pages/index');
}?>