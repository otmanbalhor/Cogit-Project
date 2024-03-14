<?php

//
//CLASS POUR RECUPERER DANS LE MODEL InvoicesManagaer LA FONCTION getInvoices()
//
require_once('Views/View.php');

class ControllerLogin{

    private $_loginManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->login();
        }
        
    }

    private function login(){

        $this->_loginManager = new LoginManager;

        //
        //INSTANCE DE INVOICESMANAGER.PHP
        //
        $login = $this->_loginManager->getLogin();

        $this->_view = new View('Login');
        $this->_view->generate(array('login' => $login));

    }
}