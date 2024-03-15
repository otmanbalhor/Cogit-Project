<?php

class InvoicesManager extends Database{

    public function getInvoices(){

        $this->getDatabase();
        
        return $this->getTable(10, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id', 'created_at', 'asc');
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('invoices');
    }

    public function getDashinvoices(){

        $this->getDatabase();

        return $this->createElemDash('invoices');
    }
}