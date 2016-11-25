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
$idtblcolonia      = '';
$nombrecolonia     = '';
$codipost      = '';
$activado       = '';
$idtblciudad  = '';
$emailmodifico  = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $idtblcolonia      = $_POST['idtblcolonia'];
	$nombrecolonia		= $_POST['nombrecolonia'];
	$codipost			= $_POST['codipost'];
	$activado		= $_POST['activado'];
    $idtblciudad        = $_POST['idtblciudad'];
	$emailmodifico	= $_POST['emailmodifico'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcolonia($idtblcolonia, $nombrecolonia,$codipost, $activado,$idtblciudad, $emailmodifico);

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
unset($idtblcolonia);
unset($nombrecolonia);
unset($codipost);
unset($activado);
unset($idtblciudad);
unset($emailmodifico);
unset($resultado);
?>