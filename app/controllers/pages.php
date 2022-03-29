<?php
class Pages extends Controller{

    public function __construct()
    {
        $this->stockModel = $this->model('Stock');
        $this->catModel = $this->model('Catagory');
    }
    public function index(){
        $post = $this->stockModel->getStockForLanding();
        $cats = $this->catModel -> getCatsForLanding();

        $posts = array('posts' => $post,
                        'cats' => $cats
        );
        
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