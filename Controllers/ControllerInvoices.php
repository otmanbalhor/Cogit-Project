<?php

//
//CLASS POUR RECUPERER DANS LE MODEL InvoicesManagaer LA FONCTION getInvoices()
//
require_once('Views/View.php');

class ControllerInvoices{

    private $_invoicesManager;
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

            if (isset($_GET['date'])){
                $sort = 'date'.$_GET['date'];
            }
            
            $this->invoices($page, $sort);
        }
        
    }

    private function invoices($page, $sort){

        $this->_invoicesManager = new InvoicesManager;

        $totalinvoices = $this->_invoicesManager->getTotals();

        //
        //INSTANCE DE INVOICESMANAGER.PHP
        //
        $invoices = $this->_invoicesManager->getInvoices($page, $sort);

        $this->_view = new View('Invoices');
        $this->_view->generate(array('invoices' => $invoices, 'totalInvoices' => $totalinvoices));

    }
}