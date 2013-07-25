<?php

// class gerer la gestion du session ecrire , lire , verifier la connexion ....
Class Session {

    public $_instanceSession = null;
    public $_session = array();

    public function __construct() {
        if (is_null($this->_instanceSession)) {
            session_start();
        }
        return $this->_instanceSession;
    }

//ecris dans une session
    public function write($key, $value) {
        if (isset($this->_session[$key])) {
            throw new Exception("Session deja existate");
            return false;
        }
        $_SESSION[$key] = $value;
        $this->add($key);
    }

//lis dans une session
    public function read($key) {
        //en verifie si la session existe
        if (isset($this->_session[$key])) {
            return $_SESSION[$key];
        } else {
            throw new Exception("La session n'existe pas ");
            return false;
        }
    }

    public function add($session) {
//si la session existe deja en return false
        if (isset($this->_session[$session])) {
            return false;
        }
        $this->_session[$session] = $session;
    }

//verifie si l'utilisateur est loggée
    public function is_login() {
//en verifie si la session id existe ou pas si non en return false si oui en return true
        if (!isset($this->_session['id'])) {
            return false;
        }
        return true;
    }

    public function destroy() {
        session_destroy();
        $this->_session = array();
    }

}