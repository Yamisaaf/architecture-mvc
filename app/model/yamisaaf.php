<?php 
class yamisaaf extends Model{
public function __construct(){
	parent::__construct();
}
public function f(){
		return parent::db()->query('SELECT * FROM news');


}

}