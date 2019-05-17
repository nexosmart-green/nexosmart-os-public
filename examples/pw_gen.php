<?php
	// incluimos BD y configuraciones
	include('includes/functions.php');

	$login = new login;

	var_dump($login->encrypt_password($_GET['p']));
?>