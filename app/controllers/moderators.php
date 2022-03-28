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


    public function editProfile(){
        
        $id=$_SESSION['MID'];
        $posts = $this->moderatorModel->getModeratorByID($id);
        $data = array( 'posts' => $posts,
                        'ModName' => '',
                        //'NIC' => '',
                        //'address' => '',
                        'ModEmail' => '',
                        'ModTP' => '',
                        'ModNameError' => '',
                        //'NICError' => '',
                        //'addressError' => '',
                        'ModEmailError' => '',
                        'ModTPError' => '',
        );
        
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'posts' => $posts,
                'ModName' => trim($_POST['ModName']),
                //'NIC' => trim($_POST['nic']),
                //'address' => trim($_POST['address']),
                'ModEmail' => trim($_POST['ModEmail']),
                'ModTP' => trim($_POST['ModTP']),
                'ModNameError' => '',
                //'NICError' => '',
                //'addressError' => '',
                'ModEmailError' => '',
                'ModTPError' => '',
            );
            
            
            //validation
            if(empty($data['ModName'])){
                $data['ModNameError'] = 'please enter the name'; 
            }
           // if(empty($data['NIC'])){
             //   $data['NICError'] = 'please enter the NIC'; 
            //}
            //if(empty($data['address'])){
              //  $data['addressError'] = 'please enter the address'; 
            //}
            if(empty($data['ModEmail'])){
                $data['ModEmailError'] = 'please enter the email'; 
            }
            if(empty($data['ModTP'])){
                $data['ModTPError'] = 'please enter the tp number'; 
            }
            
            
            if(empty($data['ModNameError']) && /*empty($data['NICError']) && empty($data['addressError']) && */ empty($data['ModEmailError']) && empty($data['ModTPError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
            
            //register user from model
            if($this->moderatorModel -> updateProfile($data,$id)){
               // redirect to login page;
               header('location:' . URLROOT. '/moderators/editProfile'); 
            }else{
                die('something went wrong');
            }
           
            // echo($data1);
            }
        }else{
            $data = array( 'posts' => $posts,
                        'ModName' => '',
                        //'NIC' => '',
                        //'address' => '',
                        'ModEmail' => '',
                        'ModTP' => '',
                        'ModNameError' => '',
                        //'NICError' => '',
                        //'addressError' => '',
                        'ModEmailError' => '',
                        'ModTPError' => '',
        );
              
        }
        $this->view('moderators/editProfile',$data);
        
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
