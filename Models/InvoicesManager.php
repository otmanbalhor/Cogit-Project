<?php

class InvoicesManager extends Database{

    private $_login;

    public function getInvoices($page){

        $this->getDatabase();

        $start = $page * 10;
        
        return $this->getTable($start, 10, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id', 'created_at', 'asc');
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('invoices');
    }

    public function getDashinvoices(){

        $this->getDatabase();

        return $this->createElemDashin('invoices');
    }

    public function log(){

        $this->getDatabase();

        return $this->login("signup");
    }

}