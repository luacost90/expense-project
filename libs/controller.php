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

}


?>