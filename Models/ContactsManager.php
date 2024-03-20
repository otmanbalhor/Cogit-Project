<?php

class ContactsManager extends Database{


    public function getContacts($page, $sort){

        $this->getDatabase();

        $start = $page * 10;

        $sortBy = 'id';
        $order = 'asc';

        if ($sort == "nameasc"){
            $sortBy = 'name';
        } else if ($sort == "namedesc"){
            $sortBy = 'name';
            $order = 'desc';
        }

        if ($sort == 'dateasc'){
            $sortBy = 'created_at';
        } else if ($sort == 'datedesc'){
            $sortBy = 'created_at';
            $order = 'desc';
        }

        return $this->getTable($start, 10,'contacts.*, companies.name as companyName','contacts','Contacts','LEFT JOIN companies ON company_id = companies.id',$sortBy,$order);
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('contacts');
    }
}
