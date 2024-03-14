<?php 

require_once('Views/Dashboard/View.php');

class ControllerDashboard{

    private $_dashboardManager;
    private $_companiesManager;
    private $_contactsManager;
    private $_invoicesManager;
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

        $this->_companiesManager = new CompaniesManager;

        $this->_contactsManager = new ContactsManager;

        $this->_invoicesManager = new InvoicesManager;

        //
        //INSTANCE DE HomeManagaer.php
        //
        $dashboard = $this->_dashboardManager->getHome();

        $totalcompanies = $this->_companiesManager->getTotals();

        $totalcontacts = $this->_contactsManager->getTotals();

        $totalinvoices = $this->_invoicesManager->getTotals();

        $this->_view = new View('Dashboard');
        $this->_view->generate(array('dashboard' => $dashboard,'totalcompanies'=> $totalcompanies,'totalcontacts'=>$totalcontacts,'totalinvoices'=>$totalinvoices));
    }
}