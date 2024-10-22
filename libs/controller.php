<?php

class Controller{

    // public $view;
    // public $model;

    function __construct(){
        // Instancia la clase que se encargará del manejo de las vistas
        $this->view = new View();
    }

    //Carga el módulo correspondiente solicitado

    function loadModel($model)
    {
        // Guarda el archivo modelo pasado como argunmento en la variable
        $url = 'models/' . $model . 'model.php';

        // Analiza si existe el archivo
        if(file_exists($url)){
            
            // Lama el archivo en cuestion
            require_once $url;

            //Guarda el nombre del modelo para posteriormente instanciarlo
            $modelName = $model . 'Model';

            $this->model = new $modelName();
        }
    }

    function existPOST($params){

        foreach($params as $param){
            if(!isset($_POST[$param])){
                error_log('CONTROLLER::existsPost => No existe el parametro' . $param);
                return true;
            }
        }

        return true;
    }

    function existGET($params){
        
        foreach($params as $param){
            if(!isset($_GET[$param])){
                error_log('CONTROLLER::existsGet => No existe el parametro' . $param);
                return true;
            }
        }

        return true;
    }

    function getGet($name){
        return $_GET[$name];
    }

    function getPost($name){
        return $_POST[$name];
    }

    function redirect($url, $messages){
        
    }
}


?>