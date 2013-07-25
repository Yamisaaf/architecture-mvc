<?php

class Base {

// variable qui prend l'instance loader
    public $load;
    public $config;
    private static $instance;
    public $chemin;

    public function __construct() {
        self::$instance = $this;
        $this->config = require BASE . 'config' . DS . 'config' . EXT;
        require BASE . 'system' . DS . 'loader' . EXT;
        $this->load = new loader;
        $this->load->loadClassMVC();
        $this->autoload();
    }

    public static function debug($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    public static function get() {
        return self::$instance;
    }

    public function libs() {

        foreach ($this->config['autoload'] as $k) {
            require BASE . 'libs' . DS . $k . EXT;
        }
    }

    public function autoload() {

        foreach ($this->config['autoload'] as $a) {
            $this->load->load_libs($a);
        }
    }

}