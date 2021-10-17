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
?>