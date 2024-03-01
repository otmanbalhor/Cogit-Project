<?php

//
//CLASS POUR RECUPERER DANS LE MODEL CompaniesManagaer LA FONCTION getCompanies()
//
require_once('Views/View.php');

class ControllerCompanies{

    private $_companiesManager;
    private $_view;
    private $_view;

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

        $this->_view = new View('Companies');
        $this->_view->generate(array('companies' => $companies));

    }
}