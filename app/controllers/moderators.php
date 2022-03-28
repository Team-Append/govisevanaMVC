<?php
class Moderators extends Controller {
    public function __construct()
    {
        $this->moderatorModel = $this-> model('moderator');
        $this->farmerModel = $this-> model('Farmer');

        

    }
public function dashboard(){
        $data = array(
            'name' => '',
            'NIC' => '',
            'address' => '',
            'email' => '',
            'tpno' => '',
        );
        
        
        $this->view('moderators/dashboard',$data);
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
            
            $loggedInUser = $this->moderatorModel->login($data['email'],$data['password']);

            if($loggedInUser){
                $this->createUserSession($loggedInUser);
                header('location:'.URLROOT.'/moderators/dashboard');
  
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

        $this->view('moderators/login',$data);
        
    }
    public function createUserSession($mod){
   
        $_SESSION['ModID']= $mod -> MID;
        $_SESSION['modName'] = $mod -> ModName;
        $_SESSION['modEmail'] = $mod -> ModEmail;
        
    }
    public function logout(){
        unset($_SESSION['ModID']);
        unset($_SESSION['modName']);
        unset($_SESSION['modEmail']);
        header('location:' .URLROOT. '/pages/index');
    }

    public function farmernotification(){
        
        $posts = $this->moderatorModel->getAllNotification();
        
        $data = array( 'posts' => $posts);
        
        $this->view('moderators/farmernotification',$data);
    }

    public function buyernotification(){
        
        $posts = $this->moderatorModel->getAllNotification();
        
        $data = array( 'posts' => $posts);
        
        $this->view('moderators/buyernotification',$data);
    }

}
