<?php
	// incluimos BD y configuraciones
	include('includes/config.php');

	// verificamos si existe el archivo
	if (!empty($_FILES)) {
		$peso_maximo = 10; // seteamos peso maximo en MB
		$peso_maximo = $peso_maximo * 1048576; // convertimos a bytes

		// chequeamos que no haya dado errores
	    if ($_FILES['nexo-img']['error'] == 0) {
			// chequeamos el peso
	      	if (($_FILES['nexo-img']['size'] > $peso_maximo)) {
	        	var_dump("Imagen mayor a $peso_maximo mb. Muy pesada");
	        	exit;
	      	}

	      	// chequeamos el formato de la imagen
	      	if ($_FILES['nexo-img']['type'] == "image/jpeg") {
	        	$logo_ext     = "jpg";
	        	$logo_quality = 85;
	      	}
	      	elseif ($_FILES['nexo-img']['type'] == "image/png") {
	        	$logo_ext     = "png";
	        	$logo_quality = 3;
	      	}
	      	else {
	        	var_dump('Tipo de imagen no soportado.');
	        	exit;
	      	}
	    }
	    // subimos imagen
     	$img_dir = upload_img($_FILES['nexo-img']['tmp_name'], $_FILES['nexo-img']['name'], "guardar", "hd", $logo_quality, "img/", $logo_ext, "windows");

     	// si está todo bien, nos devuelve la ruta de la imagen
     	var_dump($img_dir);
	}
?>
<form action="upload_img.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="nexo-img">
	<button type="submit">Enviar</button>
</form>
