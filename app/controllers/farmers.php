<?php
class Farmers extends Controller {

    public function __construct()
    {
        $this->farmerModel = $this-> model('Farmer');
        $this->stockModel = $this-> model('Stock');
        $this->orderModel = $this-> model('Order');

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
            
            $loggedInUser = $this->farmerModel->login($data['email'],$data['password']);

            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                header('location:'.URLROOT.'/farmers/dashboard');
  
            }else{
                $data['passwordError'] = 'Password or username is incorrect. Please try again' ;
            }
        }
        }else{
            $data = array(
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            );
        }
        $this->view('farmers/login',$data);
        
    }
    public function createUserSession($farmer){
   
        $_SESSION['farmerID']= $farmer -> farmerID;
        $_SESSION['name'] = $farmer -> name;
        $_SESSION['email'] = $farmer -> email;
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
            if($this->farmerModel -> register($data)){
               // redirect to login page;
               header('location:' . URLROOT. '/farmers/dashboard'); 
            }else{
                die('something went wrong');
            }


            }
        }else{
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
        }
    
        $this->view('farmers/register',$data);
    }

    public function logout(){
        unset($_SESSION['farmerID']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('location:' .URLROOT. '/pages/index');
    }

    public function dashboard(){
        $data = array(
            'name' => '',
            'NIC' => '',
            'address' => '',
            'email' => '',
            'tpno' => '',
            'rating' => '' 
        );
        
        
        $this->view('farmers/dashboard',$data);
    }
    
    public function myStock(){
        $posts = $this->stockModel->findAllPosts($_SESSION['farmerID']);

        $data = array( 'posts' => $posts);
        
        $this->view('farmers/myStock',$data);
    }

    public function myOrder(){
        $orderDetails = $this->orderModel -> getOrdersByFarmerID($_SESSION['farmerID']);
        $data = array(
            'orders' => $orderDetails,
            'status' => '',
            'orderID' => ''
        );
        
        if(!empty($_GET['orderID'])){
            
            $data = array(
                'orders' => $orderDetails,
                'status' => trim($_GET['status']),
                'orderID' => trim($_GET['orderID'])
            );

            
            if($this-> orderModel->updateOrderStatus($data['status'],$data['orderID'])){
                header('location:' . URLROOT. '/farmers/myOrder'); 
            }

        }else{
            $data = array(
                'orders' => $orderDetails
            );
        }
        $this->view('farmers/myOrder',$data);
    }

    public function viewRequest(){
        
        $this->view('farmers/viewRequest');
    }

    public function notification(){
        $id=$_SESSION['farmerID'];
        $posts = $this->farmerModel->getAllNotificationByFarmerID($id);
        
        $data = array( 'posts' => $posts);
        
        $this->view('farmers/notification',$data);
    }

    public function deleteNotification($id){
        
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //     if($this->farmerModel->deleteNotificationByNotifID($id)){
                
        //     $posts = $this->farmerModel->getAllNotificationByFarmerID($id);
        //     $notifID = $posts->notifID;
        //     $posts = $this->farmerModel->deleteNotificationByNotifID($notifID);


        //         header("Location: " . URLROOT . "/farmers/notification");
                
        //     }else {
        //         die('Something went wrong');
        //     }

        // }
        $this->view('farmers/notiOrder');
    }

    public function notiOrder(){
        
        $this->view('farmers/notiOrder');
    }


    public function analytic(){
        
        $this->view('farmers/analytic');
    }

    public function offersSent(){
        
        $this->view('farmers/offersSent');
    }

    public function earning(){
        
        $this->view('farmers/earning');
    }
    

    public function viewProfile(){

        $id=$_SESSION['farmerID'];
        $posts = $this->farmerModel->getFarmerByID($id);

        $data = array( 'posts' => $posts);
        
        $this->view('farmers/viewProfile',$data);
    }

    public function editProfile(){
        
        $id=$_SESSION['farmerID'];
        $posts = $this->farmerModel->getFarmerByID($id);
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
            if($this->farmerModel -> updateProfile($data,$id)){
               // redirect to login page;
               header('location:' . URLROOT. '/farmers/editProfile'); 
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
        $this->view('farmers/editProfile',$data);
    }
        
}