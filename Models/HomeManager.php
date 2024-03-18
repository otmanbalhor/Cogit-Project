<?php

class HomeManager extends Database {

    public function getHome(){

        $this->getDatabase();

        $lastInvoices = $this->getTable(0, 5, 'invoices.*, companies.name', 'invoices','Invoices', 'LEFT JOIN companies ON id_company = companies.id', 'created_at', 'desc');
        $lastContacts = $this->getTable(0, 5, 'contacts.*, companies.name AS companyName', 'contacts', 'Contacts', 'LEFT JOIN companies ON company_id = companies.id', 'created_at', 'desc');
        $lastCompanies = $this->getTable(0, 5, 'companies.*, types.name AS typeName', 'companies','Companies', 'LEFT JOIN types ON type_id = types.id', 'id', 'desc');

        $homeContent = (object) [
            'lastInvoices' => $lastInvoices,
            'lastContacts' => $lastContacts,
            'lastCompanies' => $lastCompanies
        ];

        return $homeContent;

    }

}