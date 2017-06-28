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
$idcupon      = '';
$nombre     = '';
$valor      = '';
$idciudad  = '';
$emailmodifico  = '';
$fecha= '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	= $_POST["solicitadoBy"];
    $idcupon      = $_POST['idcupon'];
	$nombre		= $_POST['nombre'];
	$valor			= $_POST['valor'];	
    $idciudad        = $_POST['idciudad'];
	$emailmodifico	= $_POST['emailmodifico'];
	$fecha=$_POST["fecha"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcupondescuentoSinEst($idcupon,$nombre,$valor,$idciudad,$emailmodifico,$fecha);

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
unset($idcupon);
unset($nombre);
unset($valor);
unset($idciudad);
unset($fecha);
unset($emailmodifico);
unset($resultado);
?>