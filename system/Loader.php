<?php

Class Loader {

// cette variable defini si la variable a deja été instancier
    private $class = array();

    public function __construct() {

        /* spl_autoload_register(function($class){

          $lien = BASE.'system'.DS.$class.EXT;
          if(!file_exists($lien)){
          exit("le fichier ".$class. " n'existe pas");
          }
          require $lien;
          }); */
    }

    public function test() {
        echo "Yamisaaf";
    }

    public function debugClass() {
        echo "<br/>";
        echo "-----------------------------------------------------/";
        echo "<pre>";
        print_r($this->class);
        echo "</pre>";
        echo "-----------------------------------------------------/";
        var_dump($this->class);
    }

    public function loadClassMVC() {
        require BASE . 'system' . DS . 'base' . DS . 'controller' . EXT;
        require BASE . 'system' . DS . 'base' . DS . 'model' . EXT;
        require BASE . 'system' . DS . 'Output' . EXT;
        require BASE . 'system' . DS . 'Router' . EXT;

        $this->aClass('Router');
        $this->aClass('Output');
        $this->aClass('Model');
    }

    public function aClass($name) {
//en verifie si $name existe dans la variable class si oui en exit
        if (isset($this->class[$name])) {
            return false;
        }
        $obj = new $name;
//en ajoute  a la variable class
        $this->add($name, $obj);
    }

    public function add($name, $obj) {
        if (isset($this->class[$name]))
            exit();

        $this->class[$name] = $obj;
    }

// permet d'appeler une function ou attribut d'une class depuis le load :D

    public function app($class) {

        if (!isset($this->class[$class])) {
            $this->aClass($class);
        }
        return $this->class[$class];
    }

//permet de instancer les controller
    public function load_controller($name) {
        $file = BASE . 'app' . DS . 'controller' . DS . $name . EXT;
        if (!file_exists($file)) {
            throw new Exception("Chemin de la class introuvable");

            return false;
        }
        require $file;
        return $this->class['controller'] = new $name;
    }

    //function pour charger un model
    public function load_Model($nameModel) {
        $chemin = BASE . 'app' . DS . 'model' . DS . $nameModel . EXT;
        //en verifie si le model n'existe pas 
        if (!isset($this->class[$nameModel])) {
            //en verifie si la page exist
            if (!file_exists($chemin)) {
                exit(" Le model n'existe pas");
            }
            //si le model exist en l'instance et le require dans notre variable class
            require $chemin;
            $this->aClass($nameModel);
        }
        return $this->class[$nameModel];
    }

    // permet d'instancier une librairie externe
    public function load_libs($nameLibs) {

        $chemin = BASE . 'libs' . DS . $nameLibs . EXT;
        //en verifie si le model n'existe pas 
        if (!isset($this->class[$nameLibs])) {
            //en verifie si la page exist
            if (!file_exists($chemin)) {
                exit("la libs " . $nameLibs . " n'existe pas ");
            }
            //si le model exist en l'instance et le require dans notre variable class

            $this->aClass($nameLibs);
        }
        return $this->class[$nameLibs];
    }

}

