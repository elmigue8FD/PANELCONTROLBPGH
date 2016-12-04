<?php
$strEmail=$_POST['login_email_reset'];
//ECHO 'cooreo a enviar'.$login_email_reset;

$mensaje = 'El usuario '.$strEmail.' solicita ayuda con su contraseña';

	$cabeceras  = 'MIME-Version: 1.0' . "\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";

	$cabeceras .= 'From:'.$strEmail . "\n";

	$destinatario="miguel.salas@bepickler.com";
	$asunto="Recuperacion Password";

	mail($destinatario, $asunto, $mensaje, $cabeceras);
	echo 'mensaje enviado';
?>