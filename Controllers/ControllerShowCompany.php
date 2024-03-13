<?php

//
//
//
require_once('Views/View.php');

class ControllerShowCompany{

    private $_showCompanyManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->showCompany();
        }
        
    }

    private function showCompany(){

        $this->_showCompanyManager = new ShowCompanyManager;

        //
        //INSTANCE DE CompaniesManager.php
        //
        $showCompany = $this->_showCompanyManager->getCompanies();

        $this->_view = new View('ShowCompany');
        $this->_view->generate(array('showCompany' => $showCompany));

    }
}