<?php
class DeliveryPersons extends Controller {

    public function __construct()
    {
        $this->DeliveryPersonModel = $this-> model('DeliveryPerson');

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
            
            $loggedInUser = $this->DeliveryPersonModel->login($data['email'],$data['password']);

            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                header('location:'.URLROOT);
  
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

        $this->view('deliveryPersons/login',$data);
        
    }
    public function createUserSession($deliveryPerson){
   
        $_SESSION['deliveryPersonID']= $deliveryPerson -> deliveryPersonID;
        $_SESSION['name'] = $deliveryPerson -> name;
        $_SESSION['email'] = $deliveryPerson -> email;
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
            'tpnoError' => '',
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
                'tpnoError' => '',
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
                $data['tpnoError'] = 'please enter the tp number'; 
            }
            if(empty($data['password'])){
                $data['passwordError'] = 'please enter the password'; 
            }
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordError'] = 'please confirm the password'; 
            }
            if(!empty($data['confirmPassword']) && !empty($data['password'])){
                if($data['confirmPassword'] != $data['password']){
                    $data['confirmPasswordError'] = 'passwords does not match'; 
                }
            }
            if(empty($data['nameError']) && empty($data['NICError']) && empty($data['addressError']) && empty($data['emailError']) && empty($data['tpnoError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                
            
            //hash password
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            
            //register user from model
            if($this->DeliveryPersonModel -> register($data)){
               // redirect to login page;
               header('location:' . URLROOT. '/deliveryPersons/login'); 
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
            'tpnoError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
                
            );
        }
        $this->view('DeliveryPersons/register',$data);
    }
    public function logout(){
        unset($_SESSION['deliveryPersonID']);
        unset($_SESSION['name']);
        unset($_SESSION['email']);
        header('location:' .URLROOT. '/pages/index');
    }

    public function addSchedule(){
        $this->view('deliveryPersons/addSchedule');
    }

    public function mySchedule(){
        $this->view('deliveryPersons/mySchedule');
    }

    public function viewSingleSchedule(){
        $this->view('deliveryPersons/viewSingleSchedule');
    }
    public function dashboard(){
        $this->view('deliveryPersons/dashboard');
    }
      
}