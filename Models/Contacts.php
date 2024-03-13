<?php 

class Contacts{

    private $_id;
    private $_name;
    private $_company_id;
    private $_email;
    private $_phone;
    private $_created_at;
    private $_update_at;
    private $_companyName;


    public function __construct(array $data){

        $this->hydrate($data);
    }

    public function hydrate(array $data){

        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if(method_exists($this,$method)){

                $this->{$method}($value);
            }
        }
    }

    public function setId($id){

        $id = (int) $id;

        if ($this->_id > 0) {

            $this->_id = $id;
        }
    }

    public function setName($name){

        if(is_string($name)){

            $this->_name = $name;
        }

    }

    public function setCompany_id($company_id){

        if(is_int($company_id)){

            $this->_company_id = $company_id;
        }
    }

    public function setEmail($email){

        if(is_string($email)){

            $this->_email = $email;
        }
    }

    public function setPhone($phone){

        if(is_string($phone)){

            $this->_phone = $phone;
        }
    }

    public function setCreated_at($dateCreated){

        $this->_created_at = $dateCreated;
         
     }
 
     public function setUpdate_at($dateUptade){
 
         $this->_update_at = $dateUptade;
     }

     public function setCompanyName($companyName){

        $this->_companyName = $companyName;
    }

     public function getId(){

        $id = $this->_id;

        return $id;
     }

     public function getName(){

        $name = $this->_name;

        return $name;
     }

     public function getCompany_id(){

        $company_id = $this->_company_id;

        return $company_id;
     }

     public function getEmail(){

        $email = $this->_email;

        return $email;
     }

     public function getPhone(){

        $phone = $this->_phone;

        return $phone;
     }

     public function getCreated_at(){

        $dateCreated = $this->_created_at;

        return $dateCreated;
    }

    public function getUpdate_at(){

        $dateUptade = $this->_update_at;

        return $dateUptade;
    }

    public function getCompany_Name(){

        $companyName = $this->_companyName;

        return $companyName;
    }
    



}
