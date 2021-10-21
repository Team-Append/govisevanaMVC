<?php
class Offers extends Controller {

    public function __construct()
    {
        $this->offerModel = $this-> model('Offer');  
    }

    public function addOffer(){
        //Defining the array
        $data = array(
            'offerDescription' => '',
            'offerPrice' => '',
            'offerDescriptionError' => '',
            'offerPriceError' => ''             
        );

        //catch data received from the form via POST method
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'offerDescription' => trim($_POST['offerDescription']),
                'offerPrice' => trim($_POST['offerPrice']),
                'RID' => $_GET['RID'], //fetch the RID through the GET method
                'offerDescriptionError' =>  '',
                'offerPriceError' => ''
                               
            );
            
            //validation
            if(empty($data['offerDescription'])){
                $data['offerDescriptionError'] = 'please enter the description'; 
            }
            if(empty($data['offerPrice'])){
                $data['offerPriceError'] = 'please enter the price'; 
            }
             
            //check whether the array is completed with data (check if there are any error msgs)
            if(empty($data['offerDescriptionError']) && empty($data['offerPriceError'])){
            
            //add stock to db
            if($this->offerModel -> addOffer($data)){
               // redirect to Requests page;
               header('location:' . URLROOT. '/Requests/viewRequest'); 
            }else{
                die('something went wrong');
            }
    
    
        }
    }else{
        $data = array(
            'offerDescription' => '',
            'offerPrice' => '',
            'offerDescriptionError' => '',
            'offerPriceError' => ''
            
        );
    }
        $this->view('offers/addOffer',$data); //pass data to the addOffer page
    
    }
    

}