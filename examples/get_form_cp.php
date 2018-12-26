<?php
	// incluimos BD y configuraciones
	include('includes/config.php');
?>

<ol>
	<a href="get_form_cp.php?action=create"><li>Creación</li></a>
	<a href="get_form_cp.php?action=default_edit"><li>Edición predeterminada</li></a>
	<a href="get_form_cp.php?action=custom_edit"><li>Edición personalizada</li></a>
</ol>

<?php
	$action = $_GET['action'];

	switch ($action) {
		// crear registro en tabla de la BD
		case "create":
			// seteamos la info manualmente para el ejemplo, pero esto viene del formulario del CMS/otro
			$_POST['username'] = "hi_test";
			$_POST['password'] = "example";
			$_POST['email']    = "teamgreen@nexosmart.com.ar";
			$_POST['submit']   = "submit";

			// seteo de campos para el framework
			// campo => columna en tabla de la BD
			$fields = [
				["value" => "username", "required" => 1, "type" => "user_reg", "custom" => "Error al cargar usuario, username ya utilizado o inválido"],
				["value" => "email", "type" => "user_reg_email"],
				["value" => "password", "required" => 1, "custom" => "Se debe escoger una contraseña para su usuario"],
			];

			// encriptamos contraseña
			$login = new login();
			$_POST['password'] = $login->encrypt_password($_POST['password']);

			// lo agregamos
			$agregar = get_form_cp($fields, "examples", "");

			// vemos la respuesta
			var_dump($agregar);
			break;

		// edición predeterminada de registro => editamos por columna 'id'
		case "default_edit":
			$_POST['id']          = 2;
			$_POST['email']       = "teamyellow@nexosmart.com.ar";
			$_POST['submit_edit'] = "submit_edit";

			$fields = [
				["value" => "email", "type" => "user_reg_email", "required" => 1, "custom" => "El campo a editar no puede estar vacio"],
			];

			// editamos
			$edicion = get_form_cp($fields, "examples", "");

			// vamos la respuesta
			var_dump($edicion);
			break;

		// edición personalizada de registro => editamos por la columna que se le indique
		case "custom_edit":
			$_POST['id_custom']   = "username";
			$_POST['username']    = "hi_test";
			$_POST['email']       = "teamred@nexosmart.com.ar";
			$_POST['submit_edit'] = "submit_edit";

			$fields = [
				["value" => "email", "type" => "user_reg_email", "required" => 1, "custom" => "El campo a editar no puede estar vacio"],
			];

			// editamos
			$edicion = get_form_cp($fields, "examples", "", true);

			// vamos la respuesta
			var_dump($edicion);
			break;
	}
?>