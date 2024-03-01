<?php

//
//CLASS POUR RECUPERER DANS LE MODEL CompaniesManagaer LA FONCTION getCompanies()
//
class ControllerContacts{

    private $_contactsManager;
    private $view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->contacts();
        }
        
    }

    private function contacts(){

        $this->_contactsManager = new ContactsManager;

        //
        //INSTANCE DE CompaniesManagaer.php
        //
        $contacts = $this->_contactsManager->getContacts();

        require('Views/ViewContact.php');
    }
}