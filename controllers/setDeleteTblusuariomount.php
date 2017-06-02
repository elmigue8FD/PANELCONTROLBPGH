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
$email = '';
$cel = '';
$id = '';
$estatus = '';
$emailmodifico  = '';
$resultado         = ''; 
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];   
    $email			= $_POST['email'];
    $cel			= $_POST['cel'];   
	$id			= $_POST['id'];
	$estatus	    = $_POST['estatus'];
	$emailmodifico	= $_POST['emailmodifico'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setDeleteTblusuariomount($email,$cel,$estatus,$emailmodifico,$id);
    
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
unset($email);
unset($cel);
unset($id);
unset($estatus);
unset($emailmodifico);
unset($resultado);
?>