<?php
class Pages extends Controller{

    public function __construct()
    {
        $this->stockModel = $this->model('Stock');
    }
    public function index(){
        $post = $this->stockModel->getStockForLanding();
        $posts = array('posts' => $post);
        
        $this -> view('pages/index',$posts);
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