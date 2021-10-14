<?php
    //core app class
    class Core{
        protected $currentController = 'pages';
        protected $currentMethod = 'index';
        protected $params = array();

        public function __construct()
        {
            $url = $this -> getUrl();
            //ucwords capitalize the first letter
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                $this -> currentController = ucwords($url[0]);
                unset($url[0]);
            }
            //require controller
            require_once '../app/controllers/' . $this -> currentController . '.php';
            $this->currentController = new $this->currentController;
            //part 2 of url
            if(isset($url[1])){
                if(method_exists($this-> currentController,$url[1])){
                    $this-> currentMethod = $url[1];
                    unset($url[1]);
                }
            }
            // get params
            $this-> params = $url ? array_values($url) : array();

            //call a callback with array of params

            call_user_func_array(array($this->currentController,$this-> currentMethod),$this-> params);
        }
        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');

                $url = filter_var($url, FILTER_SANITIZE_URL);
                //breaking to array
                $url = explode('/', $url);
                return $url;
            }
        }
    }