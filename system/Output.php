<?php

Class Output {

    public $_layout = 'defaut'; // c'est le layout par defaut
    public $_var = array();
    public $params = array();
    protected $instance;

    public function __construct() {
        //  en peux appeler la variable load depuis la variable instance
    }

    public function key($key, $value) {
        $this->_var[$key] = $value;
    }

    //function pour ajouter paramétre 
    public function params($key, $value) {
        $this->params[$key] = $value;
    }

    public function view($chemin, $vars = array()) {
        extract($vars); // variable a extraire
        $files = BASE . 'app' . DS . 'view' . DS . $chemin . EXT;
        if (!file_exists($files)) {
            exit("le chemin de la vue est introuvable");
        }
        ob_start();
        require $files;
        $content = ob_get_clean();
        require BASE . 'app' . DS . 'layout' . DS . Base::get()->config['MVC']['layout'] . EXT;
    }

//erreur 404
    public function e404() {
        header('HTTP/1.1 404 Not Found');
        $this->view('404');
    }

//erreur 404
    public function e403() {
        header('HTTP/1.1 403 Not Found');
        $this->view('403');
    }

//function pour generée facilement les erreus
    public function erreur($message, $titre) {
        $this->view('erreur', array(
            'message' => $message,
            'titre' => $titre
        ));
    }

//function pour gerer les success
    public function success($message, $titre) {
        $this->view('sucess', array(
            'message' => $message,
            'titre' => $titre
        ));
    }

}