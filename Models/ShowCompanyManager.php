<?php

class ShowCompanyManager extends Database{


    public function getCompany(){

        $this->getDatabase();

        $start = 0;

        $lastInvoices = $this->getTable($start,5, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id', 'created_at', 'desc');
        $lastContacts = $this->getTable($start,5, 'contacts.*, companies.name AS companyName', 'contacts', 'Contacts', 'LEFT JOIN companies ON company_id = companies.id', 'created_at', 'desc');
        $homeContent = (object) [
            'lastInvoices' => $lastInvoices,
            'lastContacts' => $lastContacts
            ];
        return $homeContent;

       
    }
}
