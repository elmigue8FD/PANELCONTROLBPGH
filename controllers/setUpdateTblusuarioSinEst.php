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
$nombre      = '';
$ap     = '';
$am      = '';
$email = '';
$ciudad = '';
$cel = '';
$puesto = '';
$id = '';
$emailmodifico  = '';
$resultado         = ''; 
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $nombre     = $_POST['nombre'];
	$ap		= $_POST['ap'];
	$am			= $_POST['am'];
    $email			= $_POST['email'];
    $ciudad			= $_POST['ciudad'];
    $cel			= $_POST['cel'];	
    $puesto        = $_POST['puesto'];
	$id			= $_POST['id'];
	$emailmodifico	= $_POST['emailmodifico'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblusuarioSinEst($nombre,$ap,$am,$email,$ciudad,$cel,$puesto,$emailmodifico,$id);
    
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
unset($nombre);
unset($ap); 
unset($am);
unset($email);
unset($ciudad);
unset($cel);
unset($puesto);
unset($id);
unset($emailmodifico);
unset($resultado);
?>