<?php
class Navigation extends Controller {
    public function __construct()
    {
        $this->navigationModel = $this-> model('Navigation');

    }

    public function navigation(){
        $posts = $this->navigationModel->navigation();

        $this->view('stocks/allStock',$posts);

    }
}
?>