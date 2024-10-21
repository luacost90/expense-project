<?php

class App{

    function __construct(){
        // Establece el valor a la variable 'url' por metodo GET
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        // Elimina el caracter '/' al final de cada cadena
        $url = rtrim($url, '/');
        // Divide la cadena separada por el caracter introducido "/" y lo converte en array
        $url = explode('/', $url);

        // Si no se esteblece ningún controlador en url
        if(empty($url[0])){
            error_log('APP::construct-> no hay controlador especificado');
            // Se obtiene al archivo del controlador por defecto "Login"
            $fileController = 'controllers/login.php';

            // Se llama el archivo obtenido
            require_once $fileController;

            // Se instancia un objeto controller
            $controller = new Login();

            // Se carga el modelo de ese controller
            $controller->loadModerl('login');

            // Renderiza la vista
            $controller->render();

            // Para terminar la clase
            return false;
        }

           // Se obtiene al archivo del controlador que este definido
            $fileController = 'controllers/' . $url[0] . '.php';

            if(file_exists($fileController)){
                // Instanciamos un objeto del controlador obtenido
                require_once $fileController;
                $controller = new $url[0];

                // Ejecuta el modelo del controller
                $controller->loadModel($url[0]);

                //Evalua si hay metodos en las clases
                if(isset($url[1])){

                    if(method_exists($controller, $url[1])){
                        // Analiza si tiene más parametros
                        if(isset($url[2])){
                            // Verificamos el números de parámetros
                            $nparam = count($url) -2;

                            // Contiene el arreglo de parámetros
                            $params = [];
                            
                            // Recorre el numero de parametros para agregarlo al array previamente definido
                            for($i = 0; $i < $nparam; $i++){
                                array_push($params, $url[$i + 2]);
                            }

                            $controller->{$url[1]}($params);

                        }else{
                            // No tiene parametros se manda a llamar el metodo tal cual
                            $controller->{$url[1]}();
                        }

                    }else{
                        //error, no existe el metodo
                    }

                }else{
                    //No ha hay metodo a cargar, se carga el metodo por defecto
                    $controller->render();
                }

            }else{

            }
    }
}

?>