<?php
	// incluimos BD y configuraciones
	include('includes/config.php');

	// seteamos la info manualmente para el ejemplo, pero esto viene del formulario de logueo
	$_POST['username'] = "teamblue";
	$_POST['password'] = "usuario1";
	$_POST['submit']   = "submit";

	$fields = [
		"examples",
		"username",
		"password",
		"es_US",
	];

	$login = new login();
	$login->start_login($fields);

	// vemos que se logueo correctamente o el error
	var_dump($_SESSION);
?>