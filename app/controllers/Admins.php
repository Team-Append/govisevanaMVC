<?php
class Admins extends Controller {

    public function __construct()
    {
        $this->adminModel = $this-> model('Admin');
        $this->stockModel = $this-> model('Stock');
        $this->requestModel = $this-> model('Request');
        

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
            
            $loggedInUser = $this->adminModel->login($data['email'],$data['password']);

            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                header('location:'.URLROOT.'/admins/dashboard');
  
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

        $this->view('Admins/login',$data);
        
    }
    public function createUserSession($admin){
   
        $_SESSION['AdminID']= $admin -> AID;
        $_SESSION['name'] = $admin -> name;
        $_SESSION['email'] = $admin -> email;
        
    }
    public function addAdmin(){
        
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
                'email' => trim($_POST['email']),
                'tpno' => trim($_POST['tpno']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nameError' => '',
                'NICError' => '',
                'addressError' => '',
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
            if(empty($data['nameError']) && empty($data['NICError']) && empty($data['addressError']) && empty($data['emailError']) && empty($data['tpError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                
            
            //hash password
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            
            //register user from model
            if($this->adminModel -> register($data)){
               // redirect to login page;
               header('location:' . URLROOT. '/admins/login'); 
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
            'emailError' => '',
            'tpError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
                
            );
        }
        $this->view('Admins/addAdmin',$data);
    }
    public function logout(){
        unset($_SESSION['AdminID']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('location:' .URLROOT. '/pages/index');
    }

    public function viewSingleAccount(){
        $this->view('admins/viewSingleAccount');
    }
    
    public function viewSingleStock(){
        $this->view('admins/viewSingleStock');
    }

    public function notification(){
        $this->view('admins/notification');
    }

    public function notiBuyerRequest(){
        $this->view('admins/notiBuyerRequest');
    }

    public function notiFarmerStock(){
        $this->view('admins/notiFarmerStock');
    }

    public function notiReporting(){
        $this->view('admins/notiReporting');
    }

    public function notiAdminContact(){
        $this->view('admins/notiAdminContact');
    }

    public function manageModerators(){
        $post = $this->adminModel->getAllModerators();
        $data = array('posts' => $post);
        $this->view('admins/manageModerators',$data);
    }
    public function addModerator(){
        $data = array(
            'modName' => '',
            'modEmail' => '',
            'modTP' => '',
            'modNameError' => '',
            'modEmailError' => '',
            'modTPError' => ''
            
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'modName' => trim($_POST['modName']),
                'modEmail' => trim($_POST['modEmail']),
                'modTP' => trim($_POST['modTP']),
                'modNameError' => '',
                'modEmailError' => '',
                'modTPError' => '', 
                'password'=> '1234'
                
            );

            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            
            //validation
            if(empty($data['modName'])){
                $data['modNameError'] = 'Please enter the Name'; 
            }
            if(empty($data['modEmail'])){
                $data['modEmailError'] = 'please enter the Email'; 
            }
            if(empty($data['modTP'])){
                $data['modTPError'] = 'please enter the TP'; 
            }
            
            
            
            
            if(empty($data['modNameError']) && empty($data['modEmailError']) && empty($data['modTPError'])){
                
            
            //add request to db
            if($this->adminModel -> addModerator($data)){
               // redirect to index;
               header('location:' . URLROOT. '/admins/manageModerators?status=success'); 
            }else{
                die('something went wrong');
            }
    
    
        }
    }else{
        $data = array(
            'modName' => '',
            'modEmail' => '',
            'modTP' => '',
            'modNameError' => '',
            'modEmailError' => '',
            'modTPError' => '',
            'password'=> ''
            
            
        );
    }
        $this->view('Admins/addModerator',$data);
    
    }
    

    
    
    // public function updateStockStatus(){
    //     if(isset($_POST['approve'])) {
    //         $posts = $this->stockModel->updateStockStatus('approved',$_GET);
    //     }
    //     if(isset($_POST['reject'])) {
    //         $posts = $this->stockModel->updateStockStatus('rejected');
    //     }
    //     $this->view('admins/pendingStock',$data);
    // }
    public function dashboard(){
        $data = array(
            'name' => '',
            'NIC' => '',
            'address' => '',
            'email' => '',
            'tpno' => '',
        );
        
        
        $this->view('admins/dashboard',$data);
    }

}