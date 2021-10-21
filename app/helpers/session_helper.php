<?php 
    session_start();

     function isBuyerLoggedIn(){
         if (isset($_SESSION['buyerID'])){
             return true;
         }else {
             return false;
         }
     }
     function isFarmerLoggedIn(){
        if (isset($_SESSION['farmerID'])){
            return true;
        }else {
            return false;
        }
    }
    function isAdminLoggedIn(){
        if (isset($_SESSION['AdminID'])){
            return true;
        }else {
            return false;
        }
    }
    function isDeliveryPersonLoggedIn(){
        if (isset($_SESSION['deliveryPersonID'])){
            return true;
        }else {
            return false;
        }
    }
    function isUserLoggedIn(){
        if (isset($_SESSION['AdminID'])||isset($_SESSION['farmerID'])||isset($_SESSION['buyerID'])){
            return true;
          }else {
            return false;
        }
    }
?>