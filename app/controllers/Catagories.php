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
            'imageError' => '',
            'catDescriptionError' => ''
        );
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $imgContent= '';
            $imgError = '';
            $image ='';
            if(!empty($_FILES["image"]["name"])) { 
                // Get file info 
                $fileName = basename($_FILES["image"]["name"]); 
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                $image = $_FILES['image']['tmp_name']; 
                // Allow certain file formats 
                $allowTypes = array('jpg','png','jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    
                    $image =$_FILES['image']['name'];
                    $tempname = $_FILES["image"]["tmp_name"];
                    $target =  "img/".$image;
                    
                    move_uploaded_file($tempname, $target); 
                }else{
                    $imgError = 'file not supported'; 
                }
            }else{
                $imgError = 'please insert a photo'; 
            }
            $data = array(
                'catName' => trim($_POST['catName']),
                'catDescription' => trim($_POST['catDescription']),
                'image' => $image,
                'catNameError' => '',
                'catDescriptionError' => '',
                
                'imageError' => $imgError  

                
            );
            
            //validation
            if(empty($data['catName'])){
                $data['catNameError'] = 'please enter the catagory Name'; 
            }
            if(empty($data['catDescription'])){
                $data['catDescriptionError'] = 'please enter the description'; 
            }
            
            
            
            if(empty($data['catNameError']) && empty($data['catDescriptionError'])&& empty($data['ImageError'])){
                
    
      
            
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
            'catDescriptionError' => '',
            'imageError' => '',
        );
    }   

        $this->view('Catagories/addCatagory',$data);
    
    }
    
}