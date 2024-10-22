<?php

class Login extends Controller{

    function __construct(){
        parent::__construct();
        error_log('Login::construct -> inicio de Login');
    }

    function render(){
        error_log('Login::render -> Carga el index del Login');
        $this->view->render('login/index');
    }
}

?>