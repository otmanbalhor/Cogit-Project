<?php

//
//
//
require_once('Views/View.php');

class ControllerShowContact{

    private $_ContactsManager;
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

        $this->_ContactsManager = new ContactsManager;

        //
        //INSTANCE DE CONTACTSMANAGER.PHP
        //
        $showContact = $this->_ContactsManager->getContacts();

        $this->_view = new View('showContact');
        $this->_view->generate(array('showContact' => $showContact));

    }
}