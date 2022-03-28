<?php
Class Stocks extends Controller{

public function __construct()
{
    $this->stockModel = $this->model('Stock');
    $this->catagoryModel = $this->model('Catagory');
    $this->requestModel = $this-> model('Request');
    $this->farmerModel = $this-> model('Farmer');
    $this->reviewModel = $this-> model('Review');
    $this->moderatorModel = $this-> model('Moderator');
    
    
}
public function viewStock(){
    $post = $this->stockModel->getStockByID($_GET['stockID']);
    $farmer = $this->farmerModel -> getFarmerByID($post -> farmerID);
    $reviews = $this->reviewModel -> getAllReviewByfarmerID($post -> farmerID);
    $farmerPosts = $this->stockModel -> getAllApprovedPosts($post -> farmerID);
    $data = array('posts' => $post,
                    'farmer'=> $farmer,
                    'reviews' => $reviews,
                    'farmerPosts' => $farmerPosts);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if($post-> qty>= $_POST['qty']){
            header('location:' . URLROOT. "/buyers/orderConfirmation?stockID=". $post->stockID."&qty=".trim($_POST['qty'])); 
        }else{
            header('location:' . URLROOT. '/stocks/viewStock?stockID='. $post->stockID);

        }
    }

    $this->view('stocks/viewStock',$data);  
}


public function allStock(){
    $stock = $this->stockModel->getAllActiveStock();
    $cats = $this->catagoryModel -> getCatagory();
    $data = array(  
        'stocks' => $stock,
        'cats' => $cats,
        'catsList' => $cats
    );
    if(isset($_GET['catID'])){
     
        $cat = $this-> catagoryModel -> getCatagorybyID($_GET['catID']);
        $data = array(  
            'stocks' => $stock,
            'cats' => $cat,
            'catsList' => $cats
        );
    }else{
            $data = array(  
                'stocks' => $stock,
                'cats' => $cats,
                'catsList' => $cats
            );
    }


    $this->view('stocks/allStock',$data);  
}



public function allCats(){
    $stock = $this->stockModel->getAllActiveStock();
    $cats = $this->catagoryModel -> getCatagory();
    $data = array(  
        'stocks' => $stock,
        'cats' => $cats,
        'catsList' => $cats
    );
    if(isset($_GET['catID'])){
     
        $cat = $this-> catagoryModel -> getCatagorybyID($_GET['catID']);
        $data = array(  
            'stocks' => $stock,
            'cats' => $cat,
            'catsList' => $cats
        );
    }else{
            $data = array(  
                'stocks' => $stock,
                'cats' => $cats,
                'catsList' => $cats
            );
    }


    $this->view('stocks/allCats',$data);  
}



public function deleteStock(){
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        if(isFarmerLoggedin()){
            $this->stockModel-> deleteStockByStockID($_GET['stockID']);
        }
        header('location:' .URLROOT. '/farmers/myStock');
    }
    
    // $cat = $this-> stockModel -> deleteStockByStockID();
    // $this->view('farmers/myStock'); 
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
            $farmer = $this-> farmerModel ->getfarmerByID($_SESSION['farmerID']);
            $desc = "farmer,".$farmer -> name ." submitted a stock" . date("Y/m/d");
            $this-> moderatorModel ->createNotificationOfFarmer($_SESSION['farmerID'], $desc,date("Y/m/d"));
            

        header('location:' . URLROOT. "/farmers/dashboard?status=success"); 
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
public function pendingStock(){
    $posts = $this->stockModel->getPendingStock();

    $data = array( 'posts' => $posts);
   
        if(isset($_GET['approve'])) {
            $posts = $this->stockModel->updateStockStatus('approved',$_GET['stockID']);
            header('location:' .URLROOT. '/stocks/PendingStock');
        }
        if(isset($_GET['reject'])) {
            $posts = $this->stockModel->updateStockStatus('rejected',$_GET['stockID']);
            header('location:' .URLROOT. '/stocks/PendingStock');
        }

    $this->view('stocks/pendingStock',$data);


}

}
?>