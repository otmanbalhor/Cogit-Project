<?php

class Companies
{

    private $_id;
    private $_name;
    private $_type_id;
    private $_country;
    private $_tva;
    private $_created_at;
    private $_update_at;
    private $_typeName;
    
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {

        foreach ($data as $key => $value) {

            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {

                $this->{$method}($value);
            }
        }
    }

    public function setId($id)
    {

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

    public function setTva($tva){

        if(is_string($tva)){

            $this->_tva = $tva;
        }
    }

    public function setCountry($country){

        if(is_string($country)){

            $this->_country = $country;
        }
    }

    public function setType_id($type_id){

        if(is_int($type_id)){

            $this->_type_id = $type_id;
        }
    }

    public function setCreated_at($dateCreated){

       $this->_created_at = $dateCreated;
        
    }

    public function setUpdate_at($dateUptade){

        $this->_update_at = $dateUptade;
    }

    public function setTypeName($typeName){

        if(is_string($typeName)){

            $this->_typeName = $typeName;
        }
    }


    public function getId(){

        $id = $this->_id;

        return $id;
    }

    public function getName(){

        $name = $this->_name;

        return $name;
    }

    public function getTva(){

        $tva = $this->_tva;

        return $tva;
    }

    public function getCountry(){

        $country = $this->_country;

        return $country;
    }

    public function getType_id(){

        $type_id = $this->_type_id;

        return $type_id;
    }

    public function getCreated_at(){

        $dateCreated = $this->_created_at;

        return $dateCreated;
    }

    public function getUpdate_at(){

        $dateUptade = $this->_update_at;

        return $dateUptade;
    }

    public function getTypeName(){

        $typeName = $this->_typeName;

        return $typeName;
    }
    
}
