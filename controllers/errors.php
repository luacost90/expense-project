<?php

class Errors extends Controller{

    function __construct(){
        parent::__construct();
        error_log('Errors::construct-> inicio de errores');
    }

    
    function render(){
        $this->view->render('errors/index');
    }

}

?>