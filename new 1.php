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
               
            }else{
                die('something went wrong');
            }
           
            // echo($data1);
            }
        }else{
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
              
        }
        $this->view('farmers/editProfile',$data);
    }