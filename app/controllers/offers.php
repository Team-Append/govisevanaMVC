<?php
class Offers extends Controller {

    public function __construct()
    {
        $this->offerModel = $this-> model('Offer');

    }
    public function addOffer(){
    
        $data = array(
            'offerDescription' => '',
            'offerPrice' => '',
            'RID' => '',
            'offerDescriptionError' => '',
            'offerPriceError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'offerDescription' => trim($_POST['offerDescription']),
                'offerPrice' => trim($_POST['offerPrice']),
                'RID' => $_GET['RID'],
                'offerDescriptionError' => '',
                'offerPriceError' => ''
                
            );
            
            //validation
            if(empty($data['offerDescription'])){
                $data['offerDescriptionError'] = 'please enter the description'; 
            }
            if(empty($data['offerPrice'])){
                $data['offerPriceError'] = 'please enter the price'; 
            }
            
            
            if(empty($data['offerDescriptionError']) && empty($data['offerPriceError'])){
                
    
      
            
            //add stock to db
            if($this->offerModel -> addOffer($data)){
               // redirect to dashboard;
               header('location:' . URLROOT. '/farmers/dashboard'); 
            }else{
                die('something went wrong');
            }
    
    
        }
    }else{
        $data = array(
            'title' => '',
            'description' => '',
            'harvestDate' => '',
            'expireDate' => '',
            'catagory' => '',
            'qty' => '',
            'fixedPrice' => '',
            'minBidPrice' => '',
            'titleError' => '',
            'descriptionError' => '',
            'harvestDateError' => '',
            'expireDateError' => '',
            'catagoryError' => '',
            'qtyError' => '',
            'fixedPriceError' => '',
            'minBidPriceError' => ''
            
        );
    }
        $this->view('stocks/addStock',$data);
    
    }
}