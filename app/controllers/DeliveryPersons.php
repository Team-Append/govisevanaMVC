<?php
class DeliveryPersons extends Controller {

    public function __construct()
    {
        $this->DeliveryPersonModel = $this-> model('DeliveryPerson');
        $this->catagoryModel = $this-> model('Catagory');

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
                header('location:'.URLROOT.'/deliveryPersons/dashboard');
  
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
            'cityError' => '',
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
                'province'=>trim($_POST['province']),
                'district'=>trim($_POST['district']),
                'city' => trim($_POST['city']),
                'email' => trim($_POST['email']),
                'tpno' => trim($_POST['tpno']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmpassword']),
                'nameError' => '',
                'NICError' => '',
                'addressError' => '',
                'provinceError'=>'',
                'districtError'=>'',
                'cityError' => '',
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
            if(empty($data['province'])){
                $data['provinceError'] = 'please enter the address'; 
            }
            if(empty($data['district'])){
                $data['districtError'] = 'please enter the district'; 
            }
            if(empty($data['city'])){
                $data['cityError'] = 'please enter the city'; 
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
            if(empty($data['confirmPassword'])){
                $data['confirmPasswordError'] = 'please confirm the password'; 
            }
            
            if(empty($data['nameError']) && empty($data['NICError']) && empty($data['addressError']) && empty($data['districtError']) && empty($data['emailError']) && empty($data['emailError']) && empty($data['tpnoError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])){
                
            
            //hash password
            $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
            
            //register user from model
            if($this->DeliveryPersonModel -> register($data)){
                 $loggedInUser = $this->DeliveryPersonModel->login(trim($_POST['email']),trim($_POST['password']));

                if($loggedInUser){
                    echo " logged in";
                    $this->createUserSession($loggedInUser);
                    // redirect to login page;
                    header('location:' . URLROOT. '/deliveryPersons/selectDeliveryArea?district[]='. $data['district']); 
                }else{
                    header('location:' . URLROOT. '/deliveryPersons/login');
                }
               
               
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
            'cityError' => '',
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

    public function analytic(){
        $this->view('deliveryPersons/analytic');
    }

    public function viewSingleSchedule(){
        $this->view('deliveryPersons/viewSingleSchedule');
    }

    public function selectDeliveryArea(){
        $data = array(
            'selectedAreas' => '',
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $str = $_POST['selectedAreas'];
            $str = str_replace('&#34;','',$str);
            $str = str_replace('[','',$str);
            $str = str_replace(']','',$str);
            $str_arr = explode(',',$str);
            $data =array(
                'selectedAreas' => trim($str),
            );
            if($this->DeliveryPersonModel->deleteAreas($_SESSION['deliveryPersonID'])){
                foreach($str_arr as $ss){
                    $this->DeliveryPersonModel->setAreas($ss);
                }
            }
            header('location:'.URLROOT.'/deliveryPersons/selectVehicleandCatagory');

        }
        $this->view('deliveryPersons/selectDeliveryArea',$data);
    }
    public function dashboard(){
        $data = array(
            'areas' => $this->DeliveryPersonModel-> getAreas($_SESSION['deliveryPersonID'])
        );
        $this->view('deliveryPersons/dashboard',$data);
    }

   // public function editProfile(){
     //   $this->view('deliveryPersons/editProfile');


        public function editProfile(){
        
            $id=$_SESSION['deliveryPersonID'];
            $posts = $this->DeliveryPersonModel->getDeliveryPersonByID($id);
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
                   header('location:' . URLROOT. '/deliveryPersons/editProfile'); 
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
            $this->view('deliveryPersons/editProfile',$data);
        }

    
    public function selectVehicleandCatagory(){
        $cat = $this->catagoryModel->getCatagory();
        $data = array(
            'cat' => $cat,
            'selectedCats' => '',
            'vehicle' => '',
            'catsError' => '',
            'vehicleError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'cat' => $cat,
                'selectedCats' => $_POST['cats'],
                'vehicle' => trim($_POST['vehicle']),
                'catsError' => '',
                'vehicleError' => ''
            );
            echo implode(" ",$_POST['cats']);
            if(empty($data['vehicle'])){
                $data['vehicleError'] = 'please enter vehicle model'; 
            }
            if(empty($data['selectedCats'])){
                $data['catsError'] = 'please enter catagories you like to deliver'; 
            }
            if(empty($data['vehicleError']) && empty($data['catsError'])){
                $vehicleSuccess = false;
                $catSuccess = false;
                foreach($data['selectedCats'] as $selectedCat){
                    if($this->DeliveryPersonModel->setCats($selectedCat)){
                        $catSuccess = true;
                    }
                }
                if($this->DeliveryPersonModel->setVehicles($data['vehicle'])){
                    $vehicleSuccess = true;
                }
                if($vehicleSuccess && $catSuccess){
                    header('location:'.URLROOT.'/deliveryPersons/dashboard');
                }
            }
            

        }else{
            $data = array(
                'cat' => $cat,
                'selectedCats' => '',
                'vehicle' => '',
                'catsError' => '',
                'vehicleError' => ''
            );
        }
        $this->view('deliveryPersons/selectVehicleandCatagory',$data);
    }
    
      
}