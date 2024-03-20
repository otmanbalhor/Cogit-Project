<?php

require_once('Views/View.php');

class ControllerShowCompany{

    private $_showCompanyManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            if (isset($_GET['companyName'])){
                $companyName = $_GET['companyName'];
            } else {
                $companyName = null;
            }

            $this->showCompany($companyName);
        }
        
    }

    private function showCompany($companyName){

        $this->_showCompanyManager = new ShowCompanyManager;

        //
        //INSTANCE DE ShowCompaniesManager.php
        //
        $showCompany = $this->_showCompanyManager->getCompany($companyName);

        $this->_view = new View('ShowCompany');
        $this->_view->generate(array('showCompany' => $showCompany));

    }
}