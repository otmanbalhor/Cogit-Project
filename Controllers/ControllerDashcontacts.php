<?php 

require_once('Views/Dashboard/View.php');

class ControllerDashcontacts{

    private $_dashcontactsManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->dashcontacts();
        }
    }

    private function dashcontacts(){

        $this->_dashcontactsManager = new ContactsManager;

        $dashcontacts = $this->_dashcontactsManager->getDashcontacts();

        $this->_view = new View('Dashcontacts');
        $this->_view->generate(array('dashcontacts' => $dashcontacts));
    }
}