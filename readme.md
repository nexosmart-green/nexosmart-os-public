
<!-- ALTER TABLE `follows` ADD `fModificacionUsuario` VARCHAR(50) NOT NULL AFTER `follow_following`, ADD `fModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `fModificacionUsuario`, ADD `fCreacion` VARCHAR(19) NOT NULL AFTER `fModificacion`, ADD `fCreacionUsuario` VARCHAR(21) NOT NULL AFTER `fCreacion`; -->

# NexoSmart Framework

A continuación se detallarán algunas de las funciones del framework _**NexoSmart**_. Recordá que para el uso correcto de las funciones del tipo **_Bases de datos_** se le deben agregar los 4 campos de modificación.

* **fModificacion**: indica el momento en el que fue modificado un registro
* **fModificacionUsuario**: guarda el usuario tomado de la variable _SESSION['id']_ que modificó el registro por última vez
* **fCreacion** indica el momento en el que fue creado el registro
* **fCreacionUsuario**:  guarda el usuario tomado de la variable _SESSION['id']_ que creó el registro

Sentencia SQL para agregar los campos en cualquier tabla, recordá cambiar *table_name* por el nombre de la tabla en el que quieras agregar los campos, y *after_column* por la última columna de la tabla donde lo vayas a agregar

```
ALTER TABLE `table_name` ADD `fModificacionUsuario` VARCHAR(50) NOT NULL AFTER `after_column`, ADD `fModificacion` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `fModificacionUsuario`, ADD `fCreacion` VARCHAR(19) NOT NULL AFTER `fModificacion`, ADD `fCreacionUsuario` VARCHAR(21) NOT NULL AFTER `fCreacion`;
```

---

## Ejemplos

Los ejemplos se encuentran dentro de la carpeta 'examples', se deberá crear primera la base de datos `nexosmart-framework` y luego importar el archivo `.sql` que se encuentra dentro.

---

## Front-back
`1. debug_errors()`

Activa el logeo de errores en PHP

`2. redireccionar($url)`

Redirecciona a donde se le indique, a cualquier nivel

* **$url** _(string)_: directorio o URL

`3. getUrl()`

Para obtener la URL actual

`4. date_to_time($date)`

Convierte fecha a _Unix Timestamp_

* **$date** _(date / string)_: formato 'Y-m-d H:i:s'

`5. verificar($user, $password, $range)`

Ayuda a verificar si un usuario tiene el rango solicitado

* **$user** _(string)_: $_SESSION['id']
* **$password** _(string)_: $_SESSION['password']
* **$range** _(string)_: definido previamente en la tabla de la base de datos

`6. BBcode($text)`

Generar código BB

* **$text** _(string)_: texto a convertir

`7. unBBcode($text)`

Volver de BBcode a texto

* **$text** _(string)_: BBcode a revertir

`8. paginar_resultados($page)`

Preguntar a Maxi :p

---

## Tiendas
`9. generate_item($id_product, $title, $img, $section, $description)`

`10. generate_mini_box($cols, $image, $price, $section, $id_product, $title, $discount)`

`11. paginar_resultados_view()`

---

## Bases de datos

`12. get_db_row($id, $field_name, $table)`

Devuelve un campo de una única fila por ID

* **$id** _(integer)_: ID de la fila
* **$field_name** _(string)_: nombre del campo a traer
* **$table** _(string)_: tabla

`13. secure_input($input)`

Asegura un campo, escapa caracteres y otras especificaciones

* **$input** _(string)_: campo a asegurar

`14. get_records_db($table, $condition, $limit, $order, $field_order)`

Obtener registros

* **$table** _(string)_: nombre de la tabla en la base de datos
* **$condition** _(string)_: condiciones WHERE
* **$limit** _(integer)_: limites de registros a traer
* **$order** _(string)_: ASC | DESC
* **$field_order** _(string)_: campo por el cual se quiere ordenar la tabla

`15. get_form_cp($fields, $table, $redirect, $debug)`

Guarda o edita un registro en la base de datos *(más detalles en el ejemplo)*. Protege automaticamente los campos antes de insertalos, por lo tanto no hace falta ningún chequeo de inyección o tipo de datos previamente.

* **$fields** _(array)_: se le debe pasar los nombres de los campos tal cual se encuentra en la tabla, y se obtiene su valor automaticamente de la variable *$_POST*
    * **value** _(string)_: nombre del campo, tal cual esta en la base de datos
    * **required** _(integer)_: 1 si se requiere que no sea vacio
    * **custom** _(string)_: mensaje personalizado que aparecerá si no se cumple la condición de requerido
    * **type** _(string)_:
        * **text¨**: valor por defecto, cuando el campo es texto/varchar/etc.
        * **number¨**: campos númericos
        * **unsecure¨**: para poder agregar un campo con etiquetas HTML o de peligró de inyección
        * **user_reg¨**: para chequear si un 'username' ya se encuentra en la base de datos
        * **user_reg_email¨**: para chequear si un 'email' ya se encuentra en la base de datos
* **$table** _(string)_: nombre de la tabla a guardar el registro
* **$redirect** _(string)_: url a redireccionar una vez guardado
* **$debug** _(boolean)_: si se le indica _true_ devuelve los datos pasados en _fields_ con su valor asignado y la consulta a cargar en la base de datos

#### Creación

Si deseamos crear un registro, se le debe agregar a nuestro *$_POST* el campo adicional `$_POST['submit'] = "submit"`

La respuesta a la correcta creación de un registro es similar a

```
[
	"status" => "added",
	"id_inserted" => id del nuevo registro,
]
```

#### Edición predeterminada

Si deseamos editar un registro, se le debe agregar a nuestro *$_POST* el campo adicional `$_POST['submit_edit'] = "submit_edit"`.
Cuando hablamos de 'edición predeterminada', hacemos referencía a que se busca editar un registro por el valor de su campo `id`

La respuesta a la correcta edición de un registro es similar a

```
[
	"status" => "updated",
	"id_inserted" => 0,
]
```

#### Edición personalizada

Cuando hablamos de 'edición personalizada', hacemos referencía a que se busca editar un registro por el valor de un campo 'X'.
Si deseamos editar un registro de forma personalizada, se le debe agregar a nuestro *$_POST* los siguientes campos

```
$_POST['submit_edit'] = "submit_edit";
$_POST['id_custom'] = "campo clave del registro";
$_POST[X] = "valor del registro a editar"; // la X hace referencia al nombre del campo personalizado que seteamos en 'id_custom'
```

La respuesta a la correcta edición de un registro es similar a

```
[
	"status" => "updated",
	"id_inserted" => 0,
]
```

Tambien poseemos una respuesta para errores, similiar a

```
[
	"status" => "error",
	"error" => el error de la consulta,
]
```

---

## Login
`16. $login = new login`

Seteo del objeto para funciones de logueo

`17. $login->start_login($params)`

Inicio de sesión. Si el logueo es correcto, los campos de la base de datos pertenicientes al usuario se guardarán en la variable *$_SESSION* para ser utilizados.

- **$params** _(array)_:
-- **Tabla** _(string)_: se indica la tabla en la cual se buscara el usuario
-- **Campo clave** _(string)_: nombre de campo clave del usuario, email o username
-- **Campo password** _(string)_: nombre del campo password para el usuario
-- **Idioma** _(string)_: idioma

`18. $login->encrypt_password($password)`

Para encriptar contraseñas. Luego debe utilizarse la misma función del framework y el objecto *login* para desencriptar

* **$password** _(string)_: cadena de caracteres a pasar para encriptar

---

## Archivos
`19. upload_img($tmp_file_name, $tmp_name, $action, $quality_px, $quality, $dir, $type, $server)`

Para subir imagen rápidamente. Devuelve la ruta con el nombre de la imagen subida.

* **$tmp_file_name** _(string)_: nombre del archivo temporal _(generalmente $_FILES[X]['tmp_name'])_
* **$tmp_name** _(string)_: nombre del archivo _(generalmente $_FILES[X]['name'])_
* **$action** _(string)_: tmp | guardar
* **$quality_px** _(string)_: fhd | hd | nq | pq
* **$quality** _(string)_: 1 a 99 para JPG | 1 a 5 para PNG
* **$dir** _(string)_ : ruta donde se va a guardar la imagen. Tener en cuenta que por defecto es `__DIR__`
* **$type** _(string)_ : png | jpg
* **$server** _(string)_: linux | windows

`20. upload_file($tmp_file_name, $tmp_name, $dir)`

Para subir un archivo rápidamente. Devuelve la ruta con el nombre del archivo subido.

* **$tmp_file_name** _(string)_: nombre del archivo temporal _(generalmente $_FILES[X]['tmp_name'])_
* **$tmp_name** _(string)_: nombre del archivo _(generalmente $_FILES[X]['name'])_
* **$dir** _(string)_ : ruta donde se va a guardar la imagen. Tener en cuenta que por defecto es `$base_url_web`, variable seteada comunmente en el `config.php` de nuestro proyecto.

---

## Snippets para VS Code

```
nexo -> 		debug_errors()
nexo -> 		redireccionar($url)
nexo -> 		getUrl($url)
nexo -> 		date_to_time($date)
nexo -> 		upload_img($file_name_tmp, $name, $type, $quality_px, $quality, $dir, $ext, $server)
nexo -> 		verificar($user, $password, $range)
nexo -> 		BBcode($text)
nexo -> 		unBBcode($text)
nexo -> 		get_db_row($id, $field_name, $table)
nexo -> 		secure_input($input)
nexo -> 		get_records_db($table, $condition, $limit, $order, $field_order)
nexo -> 		get_form_cp($fields, $table, $redirect, $debug)
nexo ->		    get_form_cp (add)
nexo ->		    get_form_cp (edit)
nexo -> 		${login} = new login; $login->start_login($params)
nexo -> 		$login->encrypt_password($password)
nexo -> 		$login->decrypt_password($password)
```

---

## Snippets para Sublime Text 3

Copiar los archivos `.sublime-snippet` y pegar en `C:\{Usuario}\Work\AppData\Roaming\Sublime Text 3\Packages\User`

```
date_to_time
debug
encrypt_password
get_form_cp
get_form_cp -> create example
get_form_cp -> edit example
get_form_cp -> custom edit example
get_records_db
get_db_row
getUrl
login
login example
redireccionar
secure_input
upload_file
upload_img
```
