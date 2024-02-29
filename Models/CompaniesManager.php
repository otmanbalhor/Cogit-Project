<?php

class CompaniesManager extends Database{


    public function getCompanies(){

        $this->getDatabase();

        return $this->getTable('companies','Companies','id',10);
    }
}
