<?php	
	
    $nombre= $_POST["enviarmensaje_nombre"];  //	
	$asunto=$_POST["enviarmensaje_asunto"];
	$destinatario="angel@gcc.com"; //$destinatario=$_POST["enviarmensaje_email"];
	$mensaje=$_POST["enviarmensaje_mensaje"];	
	$contenido="Para: ".$nombre."\nMensaje: ". $mensaje; //esto es lo que recibe la persona
		

  // echo $nombre,$asunto,$destinatario,$mensaje;	
 
	
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
	$headers .= 'From: '.$destinatario. "\n";
	
	
	$envio = mail($destinatario,$asunto,$contenido,$headers);
	     
		if(mail($destinatario,$asunto,$contenido,$headers) )	
          			{
       
    	$miresultado='El correo se ha enviado.';
             
       }else{
       $miresultado='No se envio el correo';
	       
          }  
		  echo $miresultado; 
    
	

?>