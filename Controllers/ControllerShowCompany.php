<?php

//
//
//
require_once('Views/View.php');

class ControllerShowCompany{

    private $_companiesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->showcompany();
        }
        
    }

    private function showcompany(){

        $this->_companiesManager = new CompaniesManager;

        //
        //INSTANCE DE CompaniesManagaer.php
        //
        $showcompany = $this->_companiesManager->getCompanies();

        $this->_view = new View('showcompany');
        $this->_view->generate(array('showcompany' => $showcompany));

    }
}