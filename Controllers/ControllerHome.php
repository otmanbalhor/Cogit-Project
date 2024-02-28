<?php

declare(strict_types = 1);

class HomepageController
{
    public function index()
    {
        require 'Views/home.php';
    }
}

class controllerHome{

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

        require_once('Views/AccueilView.php');
    }
}