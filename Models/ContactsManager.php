<?php

class ContactsManager extends Database{


    public function getContacts(){

        $this->getDatabase();

        return $this->getTable('contacts.*, companies.name as companyName' ,'contacts','Contacts','LEFT JOIN companies ON company_id = companies.id','id','asc');
    }

    public function getContactsPagination($page, $elemPerPage,$firstcontact) {
        
       

        $offset = $firstcontact;
        $select = 'contacts.*';


        return $this->getPagination(10,$select,'contacts', 'id', 'asc', $offset);
    }

    public function getTotalContacts() {

        return $this->getTotalSearchs("contacts");
    }

}
