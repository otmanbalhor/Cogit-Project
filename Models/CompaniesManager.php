<?php

class CompaniesManager extends Database{


    public function getCompanies(){

        $this->getDatabase();

        return $this->getTable(10, 'companies.*, types.name AS typeName', 'companies','Companies', 'LEFT JOIN types ON type_id = types.id', 'id', 'asc');
    }

    public function getTotals(){

        $this->getDatabase();

        return $this->getTotal('companies');
    }
}
