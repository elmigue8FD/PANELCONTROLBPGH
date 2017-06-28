<?php

/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
//class blog
//{
	//public function nueva_sesion()
	//{
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$email = '';
$pass = '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
	$email=$_POST["email"];	
	//$pass = hash("sha256",$_POST["pass"]);
	$pass= md5($_POST["pass"]); 
    /**  
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblusuariosmountUsuario1($email,$pass);

    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);
		
		//----------------------------------------
        		
		//----------------------------------------
        
    }else
    {
        /**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
    	InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
/**
 * Desctruimos las variables para liberar memoria
 */
	//}
 //}	
unset($solicitadoBy);
unset($email);
unset($pass);
unset($resultado);
?>