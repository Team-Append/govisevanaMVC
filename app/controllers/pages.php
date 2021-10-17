<?php
class Pages extends Controller{

    public function __construct()
    {
        $this->stockModel = $this->model('Stock');
    }
    public function index(){
        
        $this -> view('pages/index');
    }
    public function about(){
        $this -> view('pages/about');
    }
    public function accountType(){
        $posts = $this->stockModel->getStockForLanding();

        $data = array( 'posts' => $posts);

        $this -> view('pages/accountType',$data);
    }
}
?>