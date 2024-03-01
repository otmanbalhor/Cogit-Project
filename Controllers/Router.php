<?php

class Router{

    private $_ctrl;
    private $_view;

    public function reqRoute(){

        try {
            
            //fonction qui sert à charger automatiquement les classes de Models
            spl_autoload_register(function($class){
                require('Models/'.$class.'.php');
            });

            $url = '';

            //LE CONTROLLER EST INCLUS SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['url'])){

                //Récupère tout les paramètres de manière séparé de l'url.
                //filter_var 
                $url = explode('/',filter_var($_GET['url'],FILTER_SANITIZE_URL));

                //ucfirst est la 1er lettre en maj de l'url et strtolower est le reste en minisucle
                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = 'Controller'.$controller;

                $controllerFile = "Controllers/".$controllerClass.'.php';

                if(file_exists($controllerFile)){

                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }else{
                    throw new Exception('Page introuvable');
                }
            }else{
                require_once('Controllers/ControllerCompanies.php');
                $this->_ctrl = new ControllerCompanies($url);
            }

        } catch (Exception $e) {

            echo 'error ! '.$e->getMessage();
            
        }
    }
}