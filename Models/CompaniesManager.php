<?php

class CompaniesManager extends Database{


    public function getCompanies(){

        $this->getDatabase();

        return $this->getTable('companies.*, types.name AS typeName', 'companies','Companies', 'LEFT JOIN types ON type_id = types.id', 'id', 'asc');
    }
}
