<?php

class App{

    function __construct()
    {
        // Establece el valor a la variable 'url' por metodo GET
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        // Elimina el caracter '/' al final de cada cadena
        $url = rtrim($url, '/');
        // Divide la cadena separada por el caracter introducido "/" y lo converte en array
        $url = explode('/', $url);
    }
}

?>