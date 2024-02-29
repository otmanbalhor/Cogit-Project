<?php

//
//CLASS POUR RECUPERER DANS LE MODEL CompaniesManagaer LA FONCTION getCompanies()
//
class ControllerCompanies{

    private $_companiesManager;
    private $view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->companies();
        }
        
    }

    private function companies(){

        $this->_companiesManager = new CompaniesManager;

        //
        //INSTANCE DE CompaniesManagaer.php
        //
        $companies = $this->_companiesManager->getCompanies();

        require('Views/CompaniesView.php');
    }
}