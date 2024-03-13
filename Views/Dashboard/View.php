<?php

class View
{
    private $_file;
    private $_t;

    public function __construct($action)
    {
        $this->_file = 'Views/Dashboard/Display/View' .$action.'.php';
    }

    public function generate($data)
    {
        $content = $this->generateFile($this->_file, $data);

        $viewDash = $this->generateFile('Views/Dashboard/home.php', array('t' => $this->_t, 'content' => $content));

        echo $viewDash;
    }

    private function generateFile($file, $data)
    {
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;
            return ob_get_clean();
        }
        else 
            throw new Exception('Fichier ' .$file. ' introuvable');
    }
}

?>