<?php
class Catagories extends Controller {

    public function __construct()
    {
        $this->catagoryModel = $this-> model('Catagory');

    }
    public function addCatagory(){
    
        $data = array(
            'catName' => '',
            'catDescription' => '',
            'catNameError' => '',
            'catDescriptionError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = array(
                'catName' => trim($_POST['catName']),
                'catDescription' => trim($_POST['catDescription']),
                'catNameError' => '',
                'catDescriptionError' => ''
                
            );
            
            //validation
            if(empty($data['catName'])){
                $data['catNameError'] = 'please enter the catagory Name'; 
            }
            if(empty($data['catDescription'])){
                $data['catDescriptionError'] = 'please enter the description'; 
            }
            
            
            
            if(empty($data['catNameError']) && empty($data['catDescriptionError'])){
                
    
      
            
            //add stock to db
            if($this->catagoryModel -> addCatagory($data)){
               // redirect to dashboard;
               header('location:' . URLROOT. '/Admins/dashboard'); 
            }else{
                die('something went wrong');
            }
    
    
        }
    }else{
        $data = array(
            'catName' => '',
            'catDescription' => '',
            'catNameError' => '',
            'catDescriptionError' => ''
        );
    }   

        $this->view('Catagories/addCatagory',$data);
    
    }
    
}