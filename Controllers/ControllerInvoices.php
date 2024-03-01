<?php

//
//CLASS POUR RECUPERER DANS LE MODEL InvoicesManagaer LA FONCTION getInvoices()
//
class ControllerInvoices{

    private $_invoicesManager;
    private $view;

    public function __construct($url)
    {
        if(isset($url) && is_array($url) && count($url) > 1 ){
            throw new Exception('Page introuvable');
        }else{

            $this->invoices();
        }
        
    }

    private function invoices(){

        $this->_invoicesManager = new InvoicesManager;

        //
        //INSTANCE DE INVOICESMANAGER.PHP
        //
        $invoices = $this->_invoicesManager->getInvoices();

        require_once('Views/ViewInvoices.php');
    }
}