<?php

require_once('Views/View.php');

class ControllerSignup
{

    private $_signupManager;
    private $_view;

    public function __construct($url)
    {
        if (isset($url) && is_array($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {

            $this->signup();
        }
    }

    public function signup()
    {

        $this->_signupManager = new SignupManager;

        $signups = $this->_signupManager->getSignup();

        $this->_view = new View('Signup');
        $this->_view->generate(array('signups' => $signups));
    }
}
