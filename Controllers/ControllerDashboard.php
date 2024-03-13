<?php 

require_once('Views/Dashboard/View.php');

class ControllerDashboard{

    private $_dashboardManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->dashboard();
        }
        
    }

    private function dashboard(){

        $this->_dashboardManager = new HomeManager;

        //
        //INSTANCE DE HomeManagaer.php
        //
        $dashboard = $this->_dashboardManager->getHome();

        $this->_view = new View('Dashboard');
        $this->_view->generate(array('dashboard' => $dashboard));
    }
}