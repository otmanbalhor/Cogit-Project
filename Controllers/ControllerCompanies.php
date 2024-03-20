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

            $this->companies($page, $sort);
        }
        
    }

    private function companies($page, $sort){

        $this->_companiesManager = new CompaniesManager;

        $totalcompanies = $this->_companiesManager->getTotals();

        //
        //INSTANCE DE CompaniesManager.php
        //
        $companies = $this->_companiesManager->getCompanies($page, $sort);
    
        $this->_view = new View('Companies');
        $this->_view->generate(array('companies' => $companies, 'totalCompanies' => $totalcompanies));

    }
}