<?php 

require_once('Views/View.php');

class ControllerHome{

    private $_homeManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->home();
        }
        
    }

    private function home(){

        $this->_homeManager = new HomeManager;

        //
        //INSTANCE DE CompaniesManagaer.php
        //
        $home = $this->_homeManager->getHome();

        $this->_view = new View('Home');
        $this->_view->generate(array('home' => $home));
    }
}