<?php 
class home extends Controller{
	public function __construct(){
	parent::__construct() ;

	}
	public function index(){
if(!parent::cache()->startCache('hamid')){
echo "Madariiiiiiiiiiiiiiiiiiiii";
parent::session()->write('id','saaat');
parent::output()->view('saad',array('news'=>'saad'));
}
parent::cache()->endCache();


	}
	public function saad(){
    
$load =  parent::model('yamisaaf')->f();

foreach ($load as $l) {
print_r($l);

}
			}


}