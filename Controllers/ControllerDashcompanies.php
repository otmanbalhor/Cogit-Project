<?php 

require_once('Views/Dashboard/View.php');

class ControllerDashcompanies{

    private $_dashcompaniesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->dashcompanies();
        }
    }

    private function dashcompanies(){

        $this->_dashcompaniesManager = new CompaniesManager;

        $dashcompanies = $this->_dashcompaniesManager->getDashcompanies();

        $this->_view = new View('Dashcompanies');
        $this->_view->generate(array('dashcompanies' => $dashcompanies));
    }
}