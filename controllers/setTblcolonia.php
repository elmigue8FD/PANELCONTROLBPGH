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
$nombrecolonia= '';
$codipost= '';
$activado= '';
$idtblciudad= '';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $nombrecolonia      = $_POST['nombrecolonia'];
	$codipost		= $_POST['codipost'];
	$activado			= $_POST['activado'];
	$idtblciudad		= $_POST['idtblciudad'];
	$emailcreo	= $_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblcolonia($nombrecolonia,$codipost, $activado, $idtblciudad, $emailcreo);

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
unset($nombrecolonia);
unset($codipost);
unset($activado);
unset($idtblciudad);
unset($emailcreo);
unset($resultado);
?>