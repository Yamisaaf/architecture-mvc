<?php 
return array(

/******* Configuration de MVC en general********/


//configuration de la connexion a la base de donnée
'dbDefault'=>array(
'host'=>'localhost',
'username'=>'root',
'password'=>'',
'database'=>'ancestra_other',
'crud'=>false // si vous voulez utiliser l'orm faite true sinon mettez false (false pour le moment par encore coder)	
	),

//configuration des routes
'routerDefault'=>array(
'controller'=>'home',
'action'=>'index'
	),

//configuration de systeme de cache
'Cache'=>array(
'time'=>'1',// par minute
'dossier'=>'cache',
'extention'=>'.tpl'
	),

'MVC'=> array(

'layout'=>'default',//le fichier de layout par default
'TitleDefault'=>'Architecture MVC',//titre par default
	),
'cryptage'=>array(
  'cle'=>20,// cle indique cb de code son generer 
  'nombre'=>8// nombreindique cb de chaine sont generer par code
  
	),
/******* Configuration de l'autoload ********/
'autoload'=>array(
//pour autloader une libs ou une classe ajouter son nom
	/** libs par defaut : cache , session , cryptage**/
  'cache','cryptage','session'

	),
/* pour ajouter une libs externe veuillez ajouter votre libs dans 
  *le doossiers libs et ajouter son nom dans l'autoload  
  *si vous avez pas besoin d'une libs c'est trés recommencer
  *de suprimer son nom sur l'autoload pour ne pas se charger
  */
	);