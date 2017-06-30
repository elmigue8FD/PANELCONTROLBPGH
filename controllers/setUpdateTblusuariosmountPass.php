<?php
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
 
$solicitadoBy= '';
$strEmail='';
$pass='';
  // $solicitadoBy= 'WEB';
  
  if (!empty($_POST)){
   $solicitadoBy=$_POST["solicitadoBy"];
  // $solicitadoBy=$_POST["solicitadoBy"];

  //function generaPass(){
	$strEmail=$_POST['login_email_reset'];
	
	
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contraseña
    $pass1 = "";
    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;
     
    //Creamos la contraseña
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass1 .= substr($cadena,$pos,1);
    } 
    //return $pass;	
	
	
	$pass = hash("sha256",$pass1);
		
	$resultado = FuncionesBePickler::setUpdateTblusuariosmountPass($strEmail,$pass);
   
   
   
     if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
		
		$mensaje = '<!doctype html>
       <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    </head><body>
		Estimado usuario '.$strEmail.' tu nuevo password es: '.$pass1.' ,puedes cambiarlo una vez que accedas a tu cuenta.
		</body>';

	    $cabeceras  = 'MIME-Version: 1.0' . "\n";
	    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	    $cabeceras .= 'From: no-responder@bepickler.com';
	    //$cabeceras .= 'Cc: '.$strEmail.' \n';

	    $destinatario= $strEmail;
		//$destinatario= $strEmail;
	    $asunto="Recuperacion Password.";
		
        mail($destinatario,$asunto,$mensaje,$cabeceras);
	  
	  /*if(mail($destinatario, $asunto, $mensaje, $cabeceras)){
			 echo "si";
		 } else{ echo "no"; } */
		
		

    }else
    {
        /**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
    	InfoSolicitadaBy::sinDatos($solicitadoBy);
    }


		 

  }
unset($solicitadoBy);
unset($strEmail);
unset($pass);	
unset($resultado);
  //}	
?>