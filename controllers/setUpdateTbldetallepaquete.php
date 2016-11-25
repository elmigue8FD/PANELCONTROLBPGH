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
$idtbldetallepaquete      = '';
$numproductos     = '';
$arealimitada      = '';
$hrsdeentrega      = '';
$numproductcomplem      = '';
$imgsproductos      = '';
$idtblpaquete      = '';
$activado       = '';
$emailmodifico  = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $idtbldetallepaquete      = $_POST['idtbldetallepaquete'];
	$numproductos		= $_POST['numproductos'];
	$arealimitada			= $_POST['arealimitada'];
    $hrsdeentrega           = $_POST['hrsdeentrega'];
    $numproductcomplem           = $_POST['numproductcomplem'];
    $imgsproductos           = $_POST['imgsproductos'];
    $idtblpaquete           = $_POST['idtblpaquete'];
	$activado		= $_POST['activado'];
	$emailmodifico	= $_POST['emailmodifico'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTbldetallepaquete($idtbldetallepaquete,$numproductos,$arealimitada,$hrsdeentrega,$numproductcomplem,$imgsproductos,$idtblpaquete,$emailmodifico);

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
unset($idtbldetallepaquete);
unset($numproductos);
unset($arealimitada);
unset($hrsdeentrega);
unset($numproductcomplem);
unset($imgsproductos);
unset($idtblpaquete);
unset($activado);
unset($emailmodifico);
unset($resultado);
?>