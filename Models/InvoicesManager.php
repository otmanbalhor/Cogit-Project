<?php

class InvoicesManager extends Database{

    public function getInvoices(){

        $this->getDatabase();
        
        return $this->getTable('invoices','Invoices','created_at',10);
    }
}