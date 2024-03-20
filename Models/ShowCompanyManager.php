<?php

class ShowCompanyManager extends Database{


    public function getCompany($companyName){

        $this->getDatabase();

        $lastInv = $this->getTable(0, 5, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id WHERE name = "'.$companyName.'"', 'created_at', 'desc');
        $lastCont = $this->getTable(0, 5, 'contacts.*, companies.name AS companyName', 'contacts', 'Contacts', 'LEFT JOIN companies ON company_id = companies.id', 'created_at', 'desc');
        $homeContent = (object) [
            'lastInvoices' => $lastInv,
            'lastContacts' => $lastCont
            ];
        return $homeContent;

       
    }
}
