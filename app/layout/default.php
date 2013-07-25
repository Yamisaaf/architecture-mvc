<DOCTYPE>
<html>
<head>
<title><?php if(isset($title)) {echo "bien"; }else{ echo Base::get()->config['MVC']['TitleDefault'];} ?> </title>
</head>
<body>
<?php echo $content ?>
<br/>
</body>
</html>
