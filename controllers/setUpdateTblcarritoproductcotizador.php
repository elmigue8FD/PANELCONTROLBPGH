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
$idtblcarritoproductcotizador      = '';
$numpersonas     = '';
$fchentrega         = '';
$srcimgproducto       = '';
$idtblproductcotizador       = '';
$emailmodifico  = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy	                 = $_POST["solicitadoBy"];
    $idtblcarritoproductcotizador    = $_POST['idtblcarritoproductcotizador'];
	$numpersonas		             = $_POST['numpersonas'];
	$fchentrega			             = $_POST['fchentrega'];
	$srcimgproducto		             = $_POST['srcimgproducto'];
    $idtblproductcotizador           = $_POST['idtblproductcotizador'];
	$emailmodifico	                 = $_POST['emailmodifico'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblpais($idtblcarritoproductcotizador, $numpersonas, $fchentrega, $srcimgproducto, $idtblproductcotizador, $emailmodifico);

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
unset($idtblcarritoproductcotizador);
unset($numpersonas);
unset($fchentrega);
unset($srcimgproducto);
unset($idtblproductcotizador);
unset($emailmodifico);
unset($resultado);
?>