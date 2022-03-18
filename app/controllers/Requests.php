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
        'budget' => '',
        'reqCatagory' => '',
        'reqDescription' => '',
        'expectedDate' => '',
        'cat' => $cat,
        'titleError' => '',
        'qtyError' => '',
        'budgetError' => '',
        'reqCatagoryError' => '',
        'reqDescriptionError' => '',
        'expectedDateError' => ''
    );
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
        $data = array(
            'title' => trim($_POST['title']),
            'qty' => trim($_POST['qty']),
            'budget' => trim($_POST['budget']),
            'reqCatagory' => trim($_POST['catID']),
            'reqDescription' => trim($_POST['reqDescription']),
            'expectedDate' => trim($_POST['expectedDate']),
            'cat' => $cat,
            'titleError' => '',
            'qtyError' => '',
            'budgetError' => '',
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
        if(empty($data['budget'])){
            $data['budgetError'] = 'please enter the budget'; 
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
        
        
        
        if(empty($data['titleError']) && empty($data['qtyError']) && empty($data['budgetError']) && empty($data['reqCatagoryError']) && empty($data['reqDescriptionError']) && empty($data['expectedDateError'])){
            
        
        //add request to db
        if($this->requestModel -> addRequest($data)){
           // redirect to index;
           header('location:' . URLROOT. '/buyers/dashboard?status=success'); 
        }else{
            die('something went wrong');
        }


    }
}else{
    $data = array(
        'title' => '',
        'qty' => '',
        'budget' => '',
        'reqCatagory' => '',
        'reqDescription' => '',
        'expectedDate' => '',
        'cat' => $cat,
        'titleError' => '',
        'qtyError' => '',
        'budgetError' => '',
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

public function pendingRequest(){
    $posts = $this->requestModel->getPendingRequests();

    $data = array( 'posts' => $posts);

        if(isset($_GET['approve'])) {
            echo $_GET['RID'];
            $posts = $this->requestModel->updateRequestStatus('approved',$_GET['RID']);
            header('location:' .URLROOT. '/stocks/PendingRequest');
        }
        if(isset($_GET['reject'])) {
            $posts = $this->requestModel->updateRequestStatus('rejected',$_GET['RID']);
            header('location:' .URLROOT. '/stocks/PendingRequest');
        }

    $this->view('Requests/PendingRequest',$data);


}

}
?>