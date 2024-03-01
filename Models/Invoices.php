<?php

class Invoices{

    private $_id;
    private $_due_date;
    private $_ref;
    private $created_at;
    private $update_at;
    private $name;

     //
    //CETTE FONCTION VA NOUS RENVOYER AUX SETTERS POUR METTRE A JOUR LES DATAS RECUPERES SUR LES PROPRIETES AU DESSUS MAIS AVEC CERTAINS CONDITIONS
    //
    public function __construct(array $data){

        $this->hydrate($data);
    }

    public function hydrate(array $data){

        foreach ($data as $key => $value) {
            
            $method = 'set'.ucfirst($key);

            //
            //VERIFICATION SI LA METHODE EXISTE
            //

            if(method_exists($this,$method)){

                $this->{$method}($value);
            }
        }
    }

    //
    //SETTERS DOIT AVOIR LES MEMES NOMS QUE LES NOMS DES COLONNES DANS LES TABLES
    //
    public function setId($id){

        $id = (int) $id;

        if($id > 0){

            $this->_id = $id;
        }
    }

    public function setDue_date($due_date){

        $this->_due_date = $due_date;
    }

    public function setRef($ref){

        if(is_string($ref)){

            $this->_ref = $ref;
        }
    }

    public function setCreated_at($dateCreated){

        $this->created_at = $dateCreated;
    }

    public function setUpdate_at($dateUpdate){

        $this->update_at = $dateUpdate;
    }

    public function setName($companyName){

        $this->name = $companyName;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getId(){

        $id = $this->_id;

        return $id;
    }

    public function getDue_date(){

        $due_date = $this->_due_date;

        return $due_date;
    }


    public function getRef(){

        $ref = $this->_ref;

        return $ref;
    }

    public function getCreated_at(){

        $dateCreated = $this->created_at;

        return $dateCreated;
    }

    public function getUpdate_at(){

        $dateUpdate = $this->update_at;

        return $dateUpdate;
    }

    public function getName(){

        $companyName = $this->name;

        return $companyName;
    }

    public function getName(){

        $name = $this->_name;

        return $name;
    }
}