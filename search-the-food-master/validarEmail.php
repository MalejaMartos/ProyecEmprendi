<?php
echo "hellou";
//Le decimos a PHP que vamos a devolver objetos JSON
header('Content-type: application/json');
include_once('config.php');
 
//Importamos la libreria de ActiveRecord y Mailer
require 'php-activerecord/ActiveRecord.php';
require 'Mailer/PHPMailerAutoload.php';
 
//Configuracion de la base de datos
//$usuario_BD = "root";
//$pass_BD = "";
//$host_BD = "localhost";
//$nombre_BD = "blog";

//Configuracion del servidor de correo, estas configuraciones que tiene ahora son del STMP de GMAIL, si tu tienes contratado un servicion de 
//hosting seguramente este te proporciona el STMP asi que debes de configurar los datos aqui
$url_activacion = 'http://searchthefood.webcindario.com/validarEmail.php';
 
$mail = new PHPMailer;
$mail->isSMTP();                                      		// Activamos SMTP para mailer
$mail->Host = 'smtp.gmail.com';                       		// Especificamos el host del servidor SMTP
$mail->SMTPAuth = true;                               		// Activamos la autenticacion
$mail->Username = 'searchthefood@gmail.com';       		// Correo SMTP
$mail->Password = '123456andrez';                		// Contraseña SMTP
$mail->SMTPSecure = 'ssl';                            		// Activamos la encriptacion ssl
$mail->Port = 465;                               		// Seleccionamos el puerto del SMTP
$mail->From = 'searchthefood@gmail.com';
$mail->FromName = 'Te damos la bienvenida a search the food';   // Nombre del que envia el correo
$mail->isHTML(true); 						//Decimos que lo que enviamos es HTML
$mail->CharSet = 'UTF-8';  					// Configuramos el charset 
 
 
 
//Configuracion de ActiveRecord
ActiveRecord\Config::initialize(function($cfg)
{
	global $usuario,$contrasena,$host,$usuario;
	//Ruta de una carpeta que contiene los modelos de la BD (tablas)
	$cfg->set_model_directory('models');
	//Creamos la conexion
	$cfg->set_connections(array(
		'development' => 'mysql://'.$usuario.':'.$contrasena.'@'.$host.'/'.$usuario.''));
});
 
 
function enviarMail($destinatarios,$asunto,$mensaje){
	global $mail;
 
	//Agregamos a todos los destinatarios
	foreach ($destinatarios as $correo => $nombre) {
		$mail->addAddress($correo,$nombre);
	}
 
	//Añadimos el asunto del mail
	$mail->Subject = $asunto; 
 
	//Mensaje del email
	$mail->Body    = '<div align="center">Exito</div><br /><br />'.
	$mensaje;
 
	//comprobamos si el mail se envio correctamente y devolvemos la respuesta al servidor
	if(!$mail->send()) {
		return false;
	} else {
		return true;
	} 
}
 
//Funcion para registrar un nuevo usuario
function registrarNuevo(){
	global $url_activacion;
	//Creamos un vector con los datos del nuevo usuario a registrar
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$clave = $_POST['password'];
	
	unset($usuario['registrar']);
	$usuario['id_confirmacion'] = uniqid();
	$usuario['status'] = 0;
	//Se guarda en la base de datos y se le envia el correo con el link para activar su cuenta
	try
		//REVISAR
		$user = searchthefood:123456andrez:create($usuario);
		if($user){
			JSON(true,'Su cuenta fue registrado con exito. Se le ha enviado un email para activar su cuenta');
			$destino = array(
			   $usuario['email'] => $usuario['nombre']
			);
 
			$asunto = 'Confirma tu Cuenta';
 
			$mensaje = 'Estimado '.$usuario['nombre'].' para poder activar tu cuenta favor de seguir el siguiente link,
			si no puedes hacer click, favor de copiar y pegarlo en la barra de direcciones de tu navegador.<br /><br />'
			.$url_activacion.'?activar=true&id='.$user->id.'&codigo='.$user->id_confirmacion;
 
			enviarMail($destino,$asunto,$mensaje);
		}else{
			JSON(false,'El usuario no se pudo registrar');
		}
	}catch(Exception $e){
		JSON(false,'El correo ya esta registrado');
	}
}
 
//Funcion que activa a un usuario. 
function activarCuenta(){
	$datos = $_GET;
	try {
		$user = Usuario_NetoSolis::find(array('conditions'=>array('id = ? AND id_confirmacion =  ?', $datos['id'], $datos['codigo'])));
		if($user){
			$user->status = 1;
			$user->save();
			header('Location: ../login.php?msg=La activacion de su cuenta fue exitosa.');
		}
		else{
			JSON(false,'La cuenta que quiere verificar no existe.');
		}
	} catch (Exception $e) {
		JSON(false,'Error al activar la cuenta: '.$e);
	}
}
 
//Funcion para verificar los datos en el login
function verificarLogin(){
	$datos = $_POST;
	try {
		$user = searchthefood:123456andrez:find(array('conditions'=>array('email = ? AND password =  ?', $datos['email'], $datos['password'])));
		if($user){
			if($user->status == 1)
				JSON(true,'Bienvenido tus datos son correctos.');
			else
				JSON(false,'Tu cuenta no esta activada. Te enviamos un email con un link para activar tu cuenta.');
		}
		else{
			JSON(false,'Los datos son incorrectos. Favor de verificarlos.');
		}
	} catch (Exception $e) {
		JSON(false,'Los datos son incorrectos. Favor de verificarlos.'.$e);
	}
}
 
 
//funcio que convierte objetos regresados por la BD a JSON
function datosJSON($data, $options = null) {
	$out = "[";
	foreach( $data as $row) { 
		if ($options != null)
			$out .= $row->to_json($options);
		else 
			$out .= $row->to_json();
		$out .= ",";
	}
	$out = rtrim($out, ',');
	$out .= "]";
	return $out;
}
 
//Regresa mensajes en formato JSON
function JSON($exito,$msg){
		$R['exito'] = $exito;
		$R['msg'] = $msg;
		echo json_encode($R);
}
 
 
//Comprobamos las peticiones al servidor tanto GET para activar ususarios
//POST para registrar y logear a un usuario
if($_GET){
	if(isset($_GET['activar'])){
		activarCuenta();
	}
	else{
		JSON(false,"Operacion Desconocida");
	}
}
 
if($_POST){
	if(isset($_POST['registrar'])){
		registrarNuevo();
	}
	elseif(isset($_POST['login'])){
		verificarLogin();
	}
	else{
		JSON(false,"Operacion Desconocida");
	}
}
 
 
?>