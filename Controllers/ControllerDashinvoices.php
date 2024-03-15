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

        $this->_dashbinvoicesManager = new InvoicesManager;

        $dashinvoices = $this->_dashbinvoicesManager->getDashinvoices();

        var_dump($dashinvoices);

        $this->_view = new View('Dashinvoices');
        $this->_view->generate(array('dashinvoices' => $dashinvoices));
    }
}