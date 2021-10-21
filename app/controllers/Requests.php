<?php
Class Requests extends Controller{

public function __construct()
{
    $this->requestModel = $this->model('Request');
    $this->catagoryModel = $this->model('Catagory');
}
public function addRequest(){
    $cat = $this->catagoryModel->getCatagory();
    $data = array(
        'title' => '',
        'qty' => '',
        'reqCatagory' => '',
        'reqDescription' => '',
        'expectedDate' => '',
        'cat' => $cat,
        'titleError' => '',
        'qtyError' => '',
        'reqCatagoryError' => '',
        'reqDescriptionError' => '',
        'expectedDateError' => ''
    );
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data = array(
            'title' => trim($_POST['title']),
            'qty' => trim($_POST['qty']),
            'reqCatagory' => trim($_POST['catID']),
            'reqDescription' => trim($_POST['reqDescription']),
            'expectedDate' => trim($_POST['expectedDate']),
            'cat' => $cat,
            'titleError' => '',
            'qtyError' => '',
            'reqCatagoryError' => '',
            'reqDescriptionError' => '',
            'expectedDateError' => ''
            
        );
        
        //validation
        if(empty($data['title'])){
            $data['titleError'] = 'Please enter the title'; 
        }
        if(empty($data['qty'])){
            $data['qtyError'] = 'please enter the quantity'; 
        }
        if(empty($data['reqCatagory'])){
            $data['reqCatagoryError'] = 'please enter the category'; 
        }
        if(empty($data['reqDescription'])){
            $data['reqDescriptionError'] = 'please enter the description'; 
        }
        if(empty($data['expectedDate'])){
            $data['expectedDateError'] = 'please enter the Expected Date'; 
        }
        
        
        
        if(empty($data['titleError']) && empty($data['qtyError']) && empty($data['reqCatagoryError']) && empty($data['reqDescriptionError']) && empty($data['expectedDateError'])){
            
        
        //add request to db
        if($this->requestModel -> addRequest($data)){
           // redirect to index;
           header('location:' . URLROOT. '/buyers/dashboard'); 
        }else{
            die('something went wrong');
        }


    }
}else{
    $data = array(
        'title' => '',
        'qty' => '',
        'reqCatagory' => '',
        'reqDescription' => '',
        'expectedDate' => '',
        'cat' => $cat,
        'titleError' => '',
        'qtyError' => '',
        'reqCatagoryError' => '',
        'reqDescriptionError' => '',
        'expectedDateError' => ''
        
    );
}
    $this->view('Requests/addRequest',$data);

}

public function viewRequest(){

        $posts = $this->requestModel->getAllRequest();

        $data = array( 'posts' => $posts);
        
        $this->view('Requests/viewRequest',$data);
}



}
?>