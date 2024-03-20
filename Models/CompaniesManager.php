<?php

class CompaniesManager extends Database{


    public function getCompanies($page, $sort){

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
            

        return $this->getTable($start, 10, 'companies.*, types.name AS typeName', 'companies','Companies', 'LEFT JOIN types ON type_id = types.id', $sortBy, $order);
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('companies');
    }

    public function getDashcompanies(){

        $this->getDatabase();

        return $this->createElemDashcomp('companies');
    }

}
