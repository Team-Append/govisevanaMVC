<?php
class Buyers extends Controller {

    public function __construct()
    {
        $this->buyerModel = $this-> model('Buyer');

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
                header('location:'.URLROOT.'/buyers/dashboard');
  
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
                'confirmPassword' => trim($_POST['confirmpassword']),
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
            if($this->buyerModel -> register($data)){
               // redirect to login page;
               header('location:' . URLROOT. '/buyers/login'); 
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
        $this->view('buyers/register',$data);
    }
    public function logout(){
        unset($_SESSION['buyerID']);
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
        );
        
        
        $this->view('buyers/dashboard',$data);
    }

    public function myCart(){

        $this->view('buyers/myCart');
    }

    public function myRequest(){

        $this->view('buyers/myRequest');
    }

    public function receivedOffer(){

        $this->view('buyers/receivedOffer');
    }

    public function reviewFarmer(){

        $this->view('buyers/reviewFarmer');
    }

    public function notification(){

        $this->view('buyers/notification');
    }

    public function notiOffer(){

        $this->view('buyers/notiOffer');
    }

    public function notiStock(){

        $this->view('buyers/notiStock');
    }

}