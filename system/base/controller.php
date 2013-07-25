<?php
Class Controller{
	 protected $loader;
	 public function __construct(){
    Base::get()->libs();
    	}
public function model($class){
	return Base::get()->load->load_Model($class);
}
public function output(){
	return Base::get()->load->app('Output');
}

public function cache(){
	return Base::get()->load->app('cache');
}
public function session(){
	return Base::get()->load->app('session');
}
public function cryptage(){
	return Base::get()->load->app('cryptage');
}
}