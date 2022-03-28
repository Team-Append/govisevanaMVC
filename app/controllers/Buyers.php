<?php
class Buyers extends Controller {

    public function __construct()
    {
        $this->buyerModel = $this-> model('Buyer');
        $this->farmerModel = $this-> model('Farmer');
        $this->requestModel = $this-> model('Request');
        $this->offerModel = $this-> model('Offer');
        $this->orderModel = $this-> model('Order');
        $this->stockModel = $this-> model('Stock');
        $this->farmerModel = $this-> model('Farmer');
        $this->deliveryModel = $this-> model('DeliveryPerson');
        $this->reviewModel = $this-> model('Review');


    }
    public function login(){
        
        $data = array(
            'title' => 'Login page',
            'email' => '',
            'password' => '',
            'emailError' => '',
            'passwordError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data =array(
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'emailError' => '',
                'passwordError' => ''
            );
        

        // validation here
        if(empty($data['email'])){
            $data['emailError'] = 'please enter the email'; 
        }

        if(empty($data['password'])){
            $data['passwordError'] = 'please enter the password'; 
        }

        if (empty($data['passwordError']) && empty($data['emailError'])){
            
            $loggedInUser = $this->buyerModel->login($data['email'],$data['password']);

            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                if(isset($_GET['qty'])){
                    header('location:'.URLROOT.'/buyers/orderConfirmation?stockID='.$_GET['stockID'].'&qty='.$_GET['qty']);
                }else{
                header('location:'.URLROOT.'/buyers/dashboard');
                }
            }else{
                $data['passwordError'] = 'Password or username is incorrect. Please try again' ;

            }
        }
        }else{
            $data = array(
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '',
                
            );
        }

        $this->view('buyers/login',$data);
        
    }
    public function createUserSession($buyer){
   
        $_SESSION['buyerID']= $buyer -> buyerID;
        $_SESSION['name'] = $buyer -> name;
        $_SESSION['email'] = $buyer -> email;
    }
    public function register(){
        
        $data = array(
            'name' => '',
            'NIC' => '',
            'address' => '',
            'province'=>'',
            'district'=>'',
            'email' => '',
            'tpno' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'NICError' => '',
            'addressError' => '',
            'provinceError'=>'',
            'districtError'=>'',
            'emailError' => '',
            'tpError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'name' => trim($_POST['name']),
                'NIC' => trim($_POST['NIC']),
                'address' => trim($_POST['address']),
                'province'=>trim($_POST['province']),
                'district'=>trim($_POST['district']),
                'email' => trim($_POST['email']),
                'tpno' => trim($_POST['tpno']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmpassword']),
                'nameError' => '',
                'NICError' => '',
                'addressError' => '',
                'provinceError'=>'',
                'districtError'=>'',
                'emailError' => '',
                'tpError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            );
            //validation
            if(empty($data['name'])){
                $data['nameError'] = 'please enter the name'; 
            }
            if(empty($data['NIC'])){
                $data['NICError'] = 'please enter the NIC'; 
            }
            if(empty($data['address'])){
                $data['addressError'] = 'please enter the address'; 
            }
            if(empty($data['province'])){
                $data['provinceError'] = 'please enter the address'; 
            }
            if(empty($data['district'])){
                $data['districtError'] = 'please enter the district'; 
            }
            if(empty($data['email'])){
                $data['emailError'] = 'please enter the email'; 
            }
            if(empty($data['tpno'])){
                $data['tpError'] = 'please enter the tp number'; 
            }
            if(empty($data['password'])){
                $data['passwordError'] = 'please enter the password'; 
            }
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordError'] = 'please confirm the password'; 
            }
            if(!empty($data['confirmPassword']) && !empty($data['password'])){
                if($data['confirmPassword'] != $data['password']){
                    $data['confirmPasswordError'] = 'two passwords does not match'; 
                }
            }
            if(empty($data['nameError']) && empty($data['NICError']) && empty($data['addressError']) && empty($data['provinceError']) && empty($data['districtError']) && empty($data['emailError']) && empty($data['tpError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                
            
            //hash password
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            
            //register user from model
            if($this->buyerModel -> register($data)){
                $buyer=$this->buyerModel->getBuyerByNIC($data['NIC']);
                $this-> createUserSession($buyer);
               // redirect to login page;
               header('location:' . URLROOT. '/index'); 
            }else{
                die('something went wrong');
            }
        }


        }else{
            $data = array(
            'name' => '',
            'NIC' => '',
            'address' => '',
            'email' => '',
            'tpno' => '',
            'password' => '',
            'confirmPassword' => '',
            'nameError' => '',
            'NICError' => '',
            'addressError' => '',
            'provinceError'=>'',
            'districtError'=>'',
            'emailError' => '',
            'tpError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
                
            );
        }
        $this->view('buyers/register',$data);
    }
    public function logout(){
        unset($_SESSION['buyerID']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('location:' .URLROOT. '/pages/index');
    }
    public function dashboard(){
        $orders = $this->orderModel -> getOrdersByBuyerID($_SESSION['buyerID']); 
        $completedOrdersCount = $this->orderModel -> getCompletedOrdersCountByBuyerID($_SESSION['buyerID']);
        $activeStockCount = '';
        $onGoingOrdersCount = $this->orderModel -> getOnGoingOrdersCountByBuyerID($_SESSION['buyerID']);
        $data = array(
            'orders' => $orders,
            'name' => '',
            'NIC' => '',
            'address' => '',
            'email' => '',
            'tpno' => '',
            'completedOrders' => $completedOrdersCount,
            'ongoingOrders' => $onGoingOrdersCount,
        );
        
        
        $this->view('buyers/dashboard',$data);
    }

    public function myCart(){

        $this->view('buyers/myCart');
    }
    public function viewOffers(){
        $offers =  $this->offerModel -> getOffersByReq($_GET['RID']);
        $data = array(
            'posts' => $offers
        );


        $this->view('buyers/viewOffers',$data);
    }
    public function viewOrders(){
        $orders =  $this->orderModel -> getOrdersByBuyerID($_SESSION['buyerID']);
        $data = array(
            'posts' => $orders
        );


        $this->view('buyers/viewOrders',$data);
    }


    public function receivedOffer(){

        $this->view('buyers/receivedOffer');
    }


    public function orderConfirmation(){
        
        $post = $this->stockModel->getStockByID($_GET['stockID']);
        $buyer ='';
        if(isBuyerLoggedIn()){
            $buyer = $this->buyerModel->getBuyerByID($_SESSION['buyerID']);
        }

        $data = array('posts' => $post);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['orderID'])){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'posts' => $post,
                'buyer' => $buyer,
                'shippingAddress' => trim($_POST['shippingAddress']),
                'orderQty' => $_GET['qty'],
                'province' =>$_POST['province'],
                'district' => $_POST['district'],
                'provinceError' => '',
                'districtError' => '',
            );
            if(empty($data['district'])){
                $data['districtError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['province'])){
                $data['provinceError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['shippingAddress'])){
                $data['provinceError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['provinceError']) && empty($data['districtError'])){
                if($post->qty>= $data['orderQty']){
                    if($this -> orderModel-> createOrder($data)){
                        $this -> stockModel-> updateQty($post->stockID,$post->qty - $data['orderQty']);
                        
                        $buyer = $this-> buyerModel ->getBuyerByID($_SESSION['buyerID']);
                        $desc = "buyer,".$buyer -> name ." place a order to the stock post you posts on" . date("Y/m/d");
                        $farmerID = $post->farmerID;
                        
                        $this-> farmerModel ->createNotification($farmerID,$desc,date("Y/m/d"));

                        header('location:' . URLROOT. '/buyers/dashboard'); 
                    }else{
                        die('something went wrong');
                    }
                }else{
                    header('location:' . URLROOT. '/stocks/viewStock?stockID='. $post->stockID);
                }
            }
        }else{
            header('location:' . URLROOT. '/buyers/login?stockID='.$_GET['stockID'].'&qty='.$_GET['qty']);
        }

        }else{
            $data = array(  
                'posts' => $post,
                'orderQty' => $_GET['qty'],
                'buyer' => $buyer,
                'shippingAddress' => '',
                'province' =>'',
                'district' => '',
                'provinceError' => '',
                'districtError' => '',
            );
        }
        $this->view('buyers/orderConfirmation',$data);
    }
    public function offerOrderConfirmation(){
        $post = $this->offerModel->getOffersByID($_GET['offerID']);
        

        $data = array('posts' => $post);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'posts' => $post,
                'shippingAddress' => trim($_POST['shippingAddress']),
                'province' =>$_POST['province'],
                'district' => $_POST['district'],
                'provinceError' => '',
                'districtError' => '',
            );
            if(empty($data['district'])){
                $data['districtError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['province'])){
                $data['provinceError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['shippingAddress'])){
                $data['provinceError'] = 'please enter shipping infrormation'; 
            }
            if(empty($data['provinceError']) && empty($data['districtError'])){
                
                    if($this -> orderModel-> createofferOrder($data)){
                        
                        $buyer = $this-> buyerModel ->getBuyerByID($_SESSION['buyerID']);
                        $desc = "buyer,".$buyer -> name ." place a order to the offer posts on" . date("Y/m/d");
                        $farmerID = $post->farmerID;
                        
                        $this-> farmerModel ->createNotification($farmerID,$desc,date("Y/m/d"));

                        header('location:' . URLROOT. '/buyers/ongoingorders'); 
                    }else{
                        die('something went wrong');
                    }
               
            }

        }else{
            $data = array(  
                'posts' => $post,
                'orderQty' => '',
                'shippingAddress' => '',
                'province' =>'',
                'district' => '',
                'provinceError' => '',
                'districtError' => '',
            );
        }
        $this->view('buyers/offerOrderConfirmation',$data);
    }

    public function reviewFarmer(){
        
        $order = $this->orderModel -> getOrderByID($_GET['orderID']);
        $farmer = $this->farmerModel -> getFarmerByID($order -> farmerID);

        if(!$this -> reviewModel -> isReviewed($_GET['orderID'])){
        
        $data = array(
            'farmer' =>$farmer,
            'rating'=> '',
            'description' => '',
            'OrderID' => '',
            'reviewDate' => '',
            'ratingError' => '',
            'descriptionError' => ''
            );
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = array(
                    'farmer' =>$farmer,
                    'rating'=> trim($_POST['rating']),
                    'description' => trim($_POST['description']),
                    'orderID' => $_GET['orderID'],
                    'reviewDate' => date("Y/m/d"),
                    'ratingError' => '',
                    'descriptionError' => ''
                    );
                if(empty($data['rating'])){
                    $data['ratingError'] = 'please enter rating'; 
                }
                if(empty($data['description'])){
                    $data['descriptionError'] = 'please enter a review'; 
                }
                
                if(empty($data['ratingError']) && empty($data['descriptionError'])){
                    $this -> orderModel -> updateOrderStatus('completed',$_GET['orderID']);
                    $this->reviewModel-> addReview($data);
                    header('location:' . URLROOT. '/buyers/completedOrder?alert=reviewDone');
                }
    
            }else{$data = array(
            'farmer' =>$farmer,
            'rating'=> '',
            'description' => '',
            'OrderID' => '',
            'reviewDate' => '',
            'ratingError' => '',
            'descriptionError' => ''
            );}}else{
                header('location:' . URLROOT. '/buyers/completedOrder');
                }
        $this->view('buyers/reviewFarmer',$data);
    }
    public function suggestDelivery(){
        $data = array(
            
        );
        $count =0;
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

       
        $data = array(
            'deliveryPersons' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $delivery = $this-> deliveryModel -> selectElegibleDeliveryPersons($_GET['farmerID'],$_GET['buyerID']);
                $data = array(
                    'deliveryPersons' => $delivery
                );
        }else{
            $data = array(
                'deliveryPersons' => ''
            ); 
        }          
        }
        $this->view('buyers/suggestDelivery',$data);
    }

    public function notification(){
        $id=$_SESSION['buyerID'];
        $posts = $this->buyerModel->getAllNotificationByBuyerID($id);
        
        $data = array( 'posts' => $posts);
        
        $this->view('buyers/notification',$data);
    }

    public function notiOffer(){

        $this->view('buyers/notiOffer');
    }

    public function notiStock(){

        $this->view('buyers/notiStock');
    }

    public function ongoingorders(){
        $orders =  $this->orderModel -> getOngoingOrdersByBuyerID($_SESSION['buyerID']);
        $data = array(
            'posts' => $orders
        );


        $this->view('buyers/ongoingorders',$data);
    }

    public function completedOrder(){
        $orders =  $this->orderModel -> getCompletedOrdersByBuyerID($_SESSION['buyerID']);
        $data = array(
            'posts' => $orders
        );

        $this->view('buyers/completedOrder',$data);
    }

   // public function editProfile(){

       // $this->view('buyers/editProfile');
   // }

    public function analytic(){

        $this->view('buyers/analytic');
    }

    public function contactAdmin(){

        $this->view('buyers/contactAdmin');
    }
    
    public function myRequest(){

        $posts = $this->requestModel->getAllRequestByID($_SESSION['buyerID']);

        $data = array( 'posts' => $posts);
        
        $this->view('buyers/MyRequest',$data);
}

public function viewProfile(){

    $id=$_SESSION['buyerID'];
    $posts = $this->buyerModel->getBuyerByID($id);

    $data = array( 'posts' => $posts);
    
    $this->view('buyers/viewProfile',$data);
}

public function editProfile(){
        
    $id=$_SESSION['buyerID'];
    $posts = $this->buyerModel->getBuyerByID($id);
    $data = array( 'posts' => $posts,
                    'name' => '',
                    'NIC' => '',
                    'address' => '',
                    'email' => '',
                    'tpno' => '',
                    'nameError' => '',
                    'NICError' => '',
                    'addressError' => '',
                    'emailError' => '',
                    'tpError' => '',
    );
    
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data = array(
            'posts' => $posts,
            'name' => trim($_POST['name']),
            'NIC' => trim($_POST['nic']),
            'address' => trim($_POST['address']),
            'email' => trim($_POST['email']),
            'tpno' => trim($_POST['tpno']),
            'nameError' => '',
            'NICError' => '',
            'addressError' => '',
            'emailError' => '',
            'tpError' => '',
        );
        
        
        //validation
        if(empty($data['name'])){
            $data['nameError'] = 'please enter the name'; 
        }
        if(empty($data['NIC'])){
            $data['NICError'] = 'please enter the NIC'; 
        }
        if(empty($data['address'])){
            $data['addressError'] = 'please enter the address'; 
        }
        if(empty($data['email'])){
            $data['emailError'] = 'please enter the email'; 
        }
        if(empty($data['tpno'])){
            $data['tpError'] = 'please enter the tp number'; 
        }
        
        
        if(empty($data['nameError']) && empty($data['NICError']) && empty($data['addressError']) && empty($data['emailError']) && empty($data['tpError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
        
        //register user from model
        if($this->buyerModel -> updateProfile($data,$id)){
           // redirect to login page;
           header('location:' . URLROOT. '/buyers/editProfile'); 
        }else{
            die('something went wrong');
        }
       
        // echo($data1);
        }
    }else{
        $data = array( 'posts' => $posts,
                    'name' => '',
                    'NIC' => '',
                    'address' => '',
                    'email' => '',
                    'tpno' => '',
                    'nameError' => '',
                    'NICError' => '',
                    'addressError' => '',
                    'emailError' => '',
                    'tpError' => '',
    );
          
    }
    $this->view('buyers/editProfile',$data);
}



}