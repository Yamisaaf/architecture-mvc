<?php
 Class Model{
    
    protected $db;


    public function __construct(){

$this->instance();
    }
    public function instance(){


         try {
                $this->db = new PDO('mysql:host=' . Base::get()->config['dbDefault']['host'] . ';dbname=' . Base::get()->config['dbDefault']['database'] . '', '' .  Base::get()->config['dbDefault']['username'] . '', '' .  Base::get()->config['dbDefault']['password'] . '');
                $this->db->query('SET NAMES utf8');
            } catch (PDOException $e) {
                echo 'Le probléme est sur la base de donnée veuillez revoir la configuration';
            }
    }
public function db(){
    return $this->db;
}
    }
