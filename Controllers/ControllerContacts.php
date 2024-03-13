<?php

//
//CLASS POUR RECUPERER DANS LE MODEL CompaniesManagaer LA FONCTION getCompanies()
//
require_once('Views/View.php');
class ControllerContacts{

    private $_contactsManager;
    private $_view;

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

        $this->_view = new View('Contacts');

        $this->_view->generate(array('contacts' => $contacts));

        
    }
}