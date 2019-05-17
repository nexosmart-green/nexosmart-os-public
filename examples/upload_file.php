<?php
	// incluimos BD y configuraciones
	include('includes/config.php');

	// verificamos si existe el archivo
	if (!empty($_FILES)) {
		// subimos archivo
		$file_dir = upload_file($_FILES['nexo-file']['tmp_name'], $_FILES['nexo-file']['name'], '/files/');

     	// si está todo bien, nos devuelve la ruta del archivo
		var_dump($file_dir);
	}
?>
<form action="upload_file.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="nexo-file">
	<button type="submit">Enviar</button>
</form>
