// LINEAS DE COMANDO PARA UTILIZAR FRONT-BACK

debug_errors() 																		// LISTA ERRORES - DEBUGGING
redireccionar($pag)																	// REDIRECT A CUALQUIER NIVEL - $pag=string
getUrl()																			// OBTIENE URL ACTUAL
get_db_row($id,$nombre_campo,$tabla)												// Devuelve string de interés - $nombre_campo = campo de la tabla que se quiere obtener; $id = id de la fila del campo
date_to_time($date)																	// tiene que tener la forma: Y-m-d H:i:s -> devuelve timestamp en secs
upload_img($file_name_tmp,$name,$type,$calidad_px,$calidad,$direc,$extension,$sv)	// $sv="linux"|"windows"; $calidad=1-99(JPG)|1-5(PNG); $calidad_px=string(fhd-hd-nq-pq) donde fhd=fullHD(1920x1080); $type=string("temp"|"guardar")
verificar($user, $pw, $rango)														// $user & $pw=$_SESSSION directamente. $rango=string (definido en la DB)
BBcode($texto)																		// $texto=String-text
unBBcode($texto)																	// reverse de BBcode
paginar_resultados($pagina)															// $pagina=string ($_GET[pag]) - devuelve el boton y ya todo preparado para cambiar de página
get_records_db($table,$condition,$limit,$order,$order_field)						// Devuelve array con todos los campos de la tabla. Campos requeridos: $table(string), el resto de las variables se pueden eliminar. Ejemplos: $condition(string)="categories!='borrado'"; $limit(int)=15;$order(string)=ASC|DESC;$order_field(string)=id [el campo por el que se ordene el ASC|DESC]



// COMANDOS DE SEGURIDAD
secure_input($input)																// asegura cualquier input-textarea-select, lo que sea de comandos pishing

// LINEAS DE COMANDO PARA UTILIZAR EN LAS TIENDAS
generate__item($id_prod,$title,$img,$section,$descripcion)							// para las tiendas online


// PARA BACKEND UNICAMENTE O FORMULARIOS
get_form_cp($array_inputs,$db_name,$url_name)										// ejemplo #1, es complicado explicar en una línea

// FUNCIONES NUEVAS
upload_file($file_name_tmp,$name,$dir="")											// upload_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]); #ejemplo, $dir por default es "/uploads/", parámetro opcional
send_mail($to,$subject,$array_content,$html="")										// ejemplo #2, $to(string),$subject(string),$array_content(array[$url_logo,$url_login,$url_login_text,$title,$text,$text_support]),$html(string, opcional)


// CLASES NUEVAS
login
	-> start_login()																// función sin terminar -desarrollandose-
	-> encrypt_password($string)													// $string (requerida) -> devuelve string encriptada para pw



// EJEMPLOS
#1:
// agregamos una noticia en la db
$array_inputs = array(
array('value'=>'title','required'=>1),
array('value'=>'id_categories','required'=>1),
array('value'=>'description','required'=>1,'type'=>'text'),
array('value'=>'img','required'=>1)
);

if(!empty($_POST)) $error = get_form_cp($array_inputs,$db_name,"/usuario/?section=$_GET[section]&cat=$_GET[cat]");

//$array_inputs tiene que contener: 'value'(string),'required'(int),'custom'(string). La imagen siempre tiene que ser 'img'
//la img puede tenr campos adicionales que NO SON obligatorios: 'quality'("fhd","hd","nq","pq"), 'dir'(por ejemplo: "/directorio/a/subir/")
//la variable "custom" hace referencia a un texto "custom" para presentar en el error, ejemplo: si el input "name" está vacío, y yo puse en el array "custom -> 'completa el nombre'", en el error aparecerá: completa el nombre.
//la variable "type", si la dejas vacía por default te topa un input type=text, también tiene varios valores: text(textarea),number(input solo para nombre),file(subida de archivos, todos) 



########### --TERMINÉ EJEMPLO

#2:
//$array_content=[$url_logo,$url_login,$url_login_text,$title,$text,$text_support]

[$url_logo,$url_login,$url_login_text,$title,$text,$text_support]
$array_mail = [
	"//www.site.com/img/logo.png",
	"//www.site.com/ingresar",
	"Para empezar a utilizar el sitio, presioná el siguiente botón",
	"¡Bienvenido al <span>Sitio!</span>",
	"acá un texto que va en el medio del body, cualquier cosa, o dejar vacío",
	"Por cualquier inconveniente comunicate con<br/><span>soporte@tarjetealo.com</span>"
]

send_mail("mail@mail.com","hola mail!",$array_mail,$html="");

########### --TERMINÉ EJEMPLO