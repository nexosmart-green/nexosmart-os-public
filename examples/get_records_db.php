<?php
	// incluimos BD y configuraciones
	include('includes/config.php');
?>

<ol>
	<a href="get_records_db.php?action=default"><li>Obtener todos los registros</li></a>
	<a href="get_records_db.php?action=params"><li>Obtener todos los registros con parámetros</li></a>
</ol>

<?php
	$action = $_GET['action'];

	switch ($action) {
		// obtener todos los registros de la tabla
		case "default":
			$usuarios = get_records_db("examples", "");

			// ver respuesta
			var_dump($usuarios);
			break;

		// obtener 2 registros de la tabla que cumplan cierto valor, traerlos de manera ordenada ascendentemente por su id
		case "params":
			$usuarios = get_records_db("examples", "(username LIKE '%team%')", 2, "ASC", "id");

			// ver respuesta
			var_dump($usuarios);
			break;
	}
?>