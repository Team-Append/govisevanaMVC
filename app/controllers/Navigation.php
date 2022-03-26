<?php
class Navigation extends Controller {
    public function __construct()
    {
        $this->navigationModel = $this-> model('Navigation');

    }

    public function navigation(){

        if(isset($_POST["submit"])){

            $str = $_POST["search"];
        
        }
        $posts = $this->navigationModel->navigation($str);

        $this->view('stocks/allStock',$posts);

    }
}
?>