<?php
//load model and view
class Controller{
    public function model($model){
        require_once '../app/models/' . $model . '.php';

        //instantiate model

        return new $model();
    }
    //load view and check files
    public function view($view,$data = array()){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        }else{
            die("view does not exist");
        }
    }
    
}
?>