<?php

class ContactsManager extends Database{


    public function getContacts(){

        $this->getDatabase();

        return $this->getTable(10,'contacts.*, companies.name as companyName','contacts','Contacts','LEFT JOIN companies ON company_id = companies.id','id','asc');
    }
}
