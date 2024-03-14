<?php

//
//CLASS POUR RECUPERER DANS LE MODEL CompaniesManagaer LA FONCTION getCompanies()
//
require_once('Views/View.php');

class ControllerCompanies{

    private $_companiesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            if (isset($_GET['page'])){
                $page = $_GET['page'] - 1;
            } else {
                $page = 0;
            }

            $this->companies($page);
        }
        
    }

    private function companies($page){

        $this->_companiesManager = new CompaniesManager;

        $totalcompanies = $this->_companiesManager->getTotals();

        //
        //INSTANCE DE CompaniesManager.php
        //
        $companies = $this->_companiesManager->getCompanies($page);
    
        $this->_view = new View('Companies');
        $this->_view->generate(array('companies' => $companies, 'totalCompanies' => $totalcompanies));

    }
}