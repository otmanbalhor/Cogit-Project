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
        if(isset($url) && is_array($url) && count($url) > 2 ){
            throw new Exception('Page introuvable');
        }else{

            $page = 0;

            if (isset($_GET['page']) && $_GET['page'] > 0){
                $page = $_GET['page'] - 1;
            }

            $sort = null;

            if (isset($_GET['name'])){
                $sort = 'name'.$_GET['name'];
            } else if (isset($_GET['date'])){
                $sort = 'date'.$_GET['date'];
            }

            $this->contacts($page, $sort);
        }
        
    }

    private function contacts($page, $sort){

        $this->_contactsManager = new ContactsManager;

        $totalcontacts = $this->_contactsManager->getTotals();
        //
        //INSTANCE DE CompaniesManagaer.php
        //
        $contacts = $this->_contactsManager->getContacts($page, $sort);

        $this->_view = new View('Contacts');

        $this->_view->generate(array('contacts' => $contacts, 'totalContacts' => $totalcontacts));

        
    }
}