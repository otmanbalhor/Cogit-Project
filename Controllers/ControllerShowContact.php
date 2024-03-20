<?php

require_once('Views/View.php');

class ControllerShowContact{

    private $_ShowContactsManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->showContact();
        }
        
    }

    private function showContact(){

        $this->_ShowContactsManager = new HomeManager;

        //
        //INSTANCE DE CONTACTSMANAGER.PHP
        //
        $showContact = $this->_ShowContactsManager->getHome();

        $this->_view = new View('showContact');
        $this->_view->generate(array('showContact' => $showContact));

    }
}