<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy= '';
$nombre= '';
$apaterno= '';
$amaterno= '';
$email= '';
$ciudad='';
$cel= '';
$puesto = '';
$pass = '';
$estatus = '';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null. 
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $nombre      = $_POST['nombre'];
	$apaterno		= $_POST['apaterno'];
	$amaterno			= $_POST['amaterno'];
	$email		= $_POST['email'];
	$ciudad = $_POST['ciudad'];
	$cel = $_POST['cel'];
	$puesto = $_POST['puesto'];
	$pass  = $_POST['pass'];
	$estatus = $_POST['estatus'];
	$emailcreo	= $_POST['emailcreo'];
	$pass = hash("sha256",$pass);
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblusuariosmount($nombre,$apaterno,$amaterno,$email,$ciudad,$cel,$puesto,$pass,$estatus,$emailcreo);

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
unset($apaterno);
unset($amaterno);
unset($email);
unset($ciudad);
unset($cel);
unset($puesto);
unset($pass);
unset($estatus);
unset($emailcreo);
unset($resultado);
?>