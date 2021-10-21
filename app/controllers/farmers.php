<?php
class Farmers extends Controller {

    public function __construct()
    {
        $this->farmerModel = $this-> model('Farmer');
        $this->stockModel = $this-> model('Stock');

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
            if($this->farmerModel -> register($data)){
               // redirect to login page;
               header('location:' . URLROOT. '/farmers/login'); 
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
        
        $this->view('farmers/myOrder');
    }

    public function viewRequest(){
        
        $this->view('farmers/viewRequest');
    }

    public function notification(){
        
        $this->view('farmers/notification');
    }

    public function notiOrder(){
        
        $this->view('farmers/notiOrder');
    }

    public function editProfile(){
        
        $this->view('farmers/editProfile');
    }

    public function analytic(){
        
        $this->view('farmers/analytic');
    }

}