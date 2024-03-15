<?php

class ContactsManager extends Database{


    public function getContacts($page){

        $this->getDatabase();

        $start = $page * 10;

        return $this->getTable($start, 10,'contacts.*, companies.name as companyName','contacts','Contacts','LEFT JOIN companies ON company_id = companies.id','id','asc');
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('contacts');
    }
}
