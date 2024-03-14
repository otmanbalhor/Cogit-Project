<?php

class LoginManager extends Database{

    public function getLogin(){
        
        $this->getDatabase();

        $erroMsg = $this->login('signup');

        return $erroMsg;
    }
}