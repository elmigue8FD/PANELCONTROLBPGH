<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$id = '';
$email = '';
$cel = '';
$banco = '';
$clave = '';
$titular = '';
$rfc = '';
$tel = '';
$ext = '';
$dire = '';
//$col = '';
$emailmodifico  = '';
$resultado      = ''; 


/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $id			    = $_POST["id"];	
    $email			= $_POST["email"];
    $cel			= $_POST["cel"]; 
    $banco			= $_POST["banco"]; 
    $clave			= $_POST["clave"]; 
    $titular	    = $_POST["titular"]; 
    $rfc			= $_POST["rfc"]; 
    $tel			= $_POST["tel"];
    $ext			= $_POST["ext"]; 
    $dire			= $_POST["dire"]; 
   // $col			= $_POST["col"];	
	$emailmodifico	= $_POST["emailmodifico"];
	
	                                                      
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setDeleteTblproveedor1($id,$email,$cel,$banco,$clave,$titular,$rfc,$tel,$ext,$dire,$emailmodifico);
    
    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

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
unset($solicitadoBy);
unset($id);
unset($email);  
unset($cel);
unset($banco);
unset($clave);
unset($titular);
unset($rfc);
unset($tel);
unset($ext);
unset($dire);
unset($emailmodifico);
unset($resultado);

?>