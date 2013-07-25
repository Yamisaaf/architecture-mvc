<?php 
class Mod extends Model{
    public function getAll(){
        return $this->db->query('SELECT * FROM news')->fetchAll();
    }
}
