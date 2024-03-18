<?php 

require_once('Views/Dashboard/View.php');

class ControllerDashinvoices{

    private $_dashinvoicesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->dashinvoices();
        }
    }

    private function dashinvoices(){

        $this->_dashinvoicesManager = new InvoicesManager;

        $dashinvoices = $this->_dashinvoicesManager->getDashinvoices();

        $this->_view = new View('Dashinvoices');
        $this->_view->generate(array('dashinvoices' => $dashinvoices));
    }
}