<?php
Class Stocks extends Controller{

public function __construct()
{
    $this->stockModel = $this->model('Stock');
    $this->catagoryModel = $this->model('Catagory');
}
public function viewStock(){
    $post = $this->stockModel->getStockByID($_GET['stockID']);
    $data = array('posts' => $post);


    $this->view('stocks/viewStock',$data);  
}


public function allStock(){
    $stock = $this->stockModel->getAllStock();
    $cat = $this->catagoryModel -> getCatagory();
    $data = array(  
                    'stocks' => $stock,
                    'cats' => $cat,
                    );



    $this->view('stocks/allStock',$data);  
}

public function addStock(){
    $cat = $this->catagoryModel->getCatagory();
    
    $data = array(
        'title' => '',
        'description' => '',
        'harvestDate' => '',
        'expireDate' => '',
        'catagory' => '',
        'qty' => '',
        'fixedPrice' => '',
        'minBidPrice' => '',
        'cat' => $cat,
        'titleError' => '',
        'descriptionError' => '',
        'harvestDateError' => '',
        'expireDateError' => '',
        'catagoryError' => '',
        'qtyError' => '',
        'fixedPriceError' => '',
        'minBidPriceError' => '',
        'imageError' => ''
    );
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $imgContent= '';
        $imgError = '';
        if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            $image = $_FILES['image']['tmp_name']; 
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg'); 
            if(in_array($fileType, $allowTypes)){ 
                
                $image =$_FILES['image']['name'];
                $tempname = $_FILES["image"]["tmp_name"];
                $target =  "img/".$image;
                
                move_uploaded_file($tempname, $target); 
            }else{
                $imgError = 'file not supported'; 
            }
        }else{
            $imgError = 'please insert a photo'; 
        }
        

        $data = array(
            'title' => trim($_POST['title']),
            'description' => trim($_POST['description']),
            'harvestDate' => trim($_POST['harvestDate']),
            'expireDate' => trim($_POST['expireDate']),
            'catagory' => trim($_POST['catID']),
            'qty' => trim($_POST['qty']),
            'fixedPrice' => trim($_POST['fixedPrice']),
            'minBidPrice' => trim($_POST['minBidPrice']),
            'cat' => $cat,
            'image' => $image,
            'titleError' =>  '',
            'descriptionError' => '',
            'harvestDateError' => '',
            'expireDateError' => '',
            'catagoryError' => '',
            'qtyError' => '',
            'fixedPriceError' => '',
            'minBidPriceError' => '',
            'imageError' => $imgError
         
            
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
        
        
        
        if(empty($data['titleError']) && empty($data['descriptionError']) && empty($data['harvestDateError']) && empty($data['expireDateError']) && empty($data['catagoryError']) && empty($data['qtyError']) && empty($data['fixedPriceError']) && empty($data['minBidPriceError']) && empty($data['ImageError'])){
            

  
        
        //add stock to db
        if($this->stockModel -> addStock($data)){
<<<<<<< HEAD
           // redirect to dashboard;
           
        //    header('location:' . URLROOT. '/farmers/dashboard'); 
=======

        header('location:' . URLROOT. "/farmers/dashboard?status=success"); 
>>>>>>> 5c3fa857947ca2531d5d4109ba2059fe05e28fb5
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
        'cat' => $cat,
        'titleError' => '',
        'descriptionError' => '',
        'harvestDateError' => '',
        'expireDateError' => '',
        'catagoryError' => '',
        'qtyError' => '',
        'fixedPriceError' => '',
        'minBidPriceError' => '',
        'imageError' => ''
        
    );
}
    $this->view('stocks/addStock',$data);

}
}
?>