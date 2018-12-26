<?php
	// incluimos el framework
    require('functions.php');

	// configuración de la base de datos
    $database       = "nexosmart-framework";
    $mysql_user     = "root";
    $mysql_password = "";
    $mysql_host     = "localhost";

	// iniciamos la base de datos
    $dbConn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $database);
    // seteo de caracteres a 'utf8'
    if (!mysqli_set_charset($dbConn, "utf8")) {
     	echo "Error de seteo de caracteres en BD";
    	exit;
    }

	// seteamos para mostrar/ocultar errores
	error_reporting(0);
?>