<?php
Class Stocks extends Controller{

public function __construct()
{
    $this->stockModel = $this->model('Stock');
}
public function addStock(){
    
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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data = array(
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'harvestDate' => trim($_POST['harvestDate']),
            'expireDate' => trim($_POST['expireDate']),
            'catagory' => trim($_POST['catagory']),
            'qty' => trim($_POST['qty']),
            'fixedPrice' => trim($_POST['fixedPrice']),
            'minBidPrice' => trim($_POST['minBidPrice']),
            'titleError' =>  '',
            'descriptionError' => '',
            'harvestDateError' => '',
            'expireDateError' => '',
            'catagoryError' => '',
            'qtyError' => '',
            'fixedPriceError' => '',
            'minBidPriceError' => ''
            
        );
        
        //validation
        if(empty($data['title'])){
            $data['titleError'] = 'please enter the title'; 
        }
        if(empty($data['description'])){
            $data['descriptionError'] = 'please enter the description'; 
        }
        if(empty($data['harvestDate'])){
            $data['harvestDateError'] = 'please enter the harvestDate'; 
        }
        if(empty($data['expireDate'])){
            $data['expireDateError'] = 'please enter the expireDate'; 
        }
        if(empty($data['catagory'])){
            $data['catagoryError'] = 'please enter the catagory'; 
        }
        if(empty($data['qty'])){
            $data['qtyError'] = 'please enter the qty'; 
        }
        if(empty($data['fixedPrice'])){
            $data['fixedPriceError'] = 'please confirm the fixedPrice'; 
        }
        if(empty($data['minBidPrice'])){
            $data['minBidPriceError'] = 'please confirm the minimum Bid Price'; 
        }
        
        
        if(empty($data['titleError']) && empty($data['descriptionError']) && empty($data['harvestDateError']) && empty($data['expireDateError']) && empty($data['catagoryError']) && empty($data['qtyError']) && empty($data['fixedPriceError']) && empty($data['minBidPriceError'])){
            

  
        
        //add stock to db
        if($this->stockModel -> addStock($data)){
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
?>