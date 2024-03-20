<?php

class InvoicesManager extends Database{

    public function getInvoices($page, $sort){

        $this->getDatabase();

        $start = $page * 10;

        $sortBy = 'created_at';
        $order = 'asc';

        if ($sort == 'dateasc'){
            $sortBy = 'created_at';
        } else if ($sort == 'datedesc'){
            $sortBy = 'created_at';
            $order = 'desc';
        }
        
        return $this->getTable($start, 10, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id', $sortBy, $order);
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