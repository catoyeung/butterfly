<?php

class MY_Controller extends CI_Controller {

    function __construct()
    {
        // if user goes to login page
        /*$klass = $ci->router->fetch_class();
        $method = $ci->router->fetch_method();
        echo $klass.$method;
        if ($klass == 'pages' && $method == 'index') {
            parent::__construct();
            return;
        }*/
        parent::__construct();
        $klass = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        if ($klass == 'pages' && $method == 'index') {
            return;
        }
    }
}
