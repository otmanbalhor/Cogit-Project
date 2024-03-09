<?php

class SignupManager extends Database{


    public function getSignup(){

        $this->getDatabase();

        return $this->postSignup("signup");
    }
}
