<?php
class Pages extends Controller{

    public function __construct()
    {
        $this->buyerModel = $this->model('Buyer');
    }
    public function index(){
        
        $this -> view('pages/index');
    }
    public function about(){
        $this -> view('pages/about');
    }
    public function accountType(){
        $this -> view('pages/accountType');
    }
}
?>