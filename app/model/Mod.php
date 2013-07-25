<?php 
class Mod extends Model{
    public function getAll(){
        return Base::instance()->db->query('SELECT * FROM news')->fetchAll();
    }
}
