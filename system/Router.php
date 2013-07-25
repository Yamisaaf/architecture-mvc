<?php

Class Router {

    public $url = array();
    public $chemin;
    public $args = array();
    public $module = array();

    public function __construct() {
        if (empty($_SERVER['PATH_INFO'])) {
            $this->url = '';
        } else {
            $this->url = explode('/', substr($_SERVER['PATH_INFO'], 1));
        }
        $url = $this->url;
        $this->module['controller'] = isset($url[0]) ? $url[0] : Base::get()->config['routerDefault']['controller'];
        $this->module['action'] = isset($url[1]) ? $url[1] : Base::get()->config['routerDefault']['action'];
        if (count($this->url) > 2) {
            $this->args = array_slice($this->url, 2);
        }


        $controller = Base::get()->load->load_controller($this->module['controller']);

        if (!method_exists($controller, $this->module['action'])) {
            exit("la method n'existe pas ");
        }

        /* $this->controller = isset($url[0]) ? $url[0] : $this->controller;
          $this->action  = isset($url[1]) ? $url[1] : $this->action;
          $controllers =  Base::get()->load->load_controller($this->controller);
          if(count($this->url)>2)
          $this->args=array_slice($url, 2);

         */
        call_user_func_array(array($this->module['controller'], $this->module['action']), $this->args);
    }

}

