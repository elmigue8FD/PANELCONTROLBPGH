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
$idtblordencompra= '';
$fchordencompra='';
$toralorden='';
$statuspagado='';
$nombrecliente='';
$sistemapago='';
$facturacion='';
$devolucion='';
$stripentoken='';
$emailstripe='';
$calif='';
$idtblcliente='';
$idtblsistpago='';
$emailmodificacion= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $fchordencompra=$_POST["fchordencompra"];
    $toralorden=$_POST["toralorden"];
    $statuspagado=$_POST["statuspagado"];
    $nombrecliente=$_POST["nombrecliente"];
    $sistemapago=$_POST["sistemapago"];
    $facturacion=$_POST["facturacion"];
    $devolucion=$_POST["devolucion"];
    $stripentoken=$_POST["stripentoken"];
    $emailstripe=$_POST["emailstripe"];
    $calif=$_POST["calif"];
    $idtblcliente=$_POST["idtblcliente"];
    $idtblsistpago=$_POST["idtblsistpago"];
    $emailmodificacion=$_POST["emailmodificacion"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblordencompra($fchordencompra, $toralorden,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion,$stripentoken,$emailstripe,$calif,$idtblcliente,$idtblsistpago,$emailmodificacion,$idtblordencompra);

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
unset($idtblordencompra);
unset($fchordencompra);
unset($toralorden);
unset($statuspagado);
unset($nombrecliente);
unset($sistemapago);
unset($facturacion);
unset($devolucion);
unset($stripentoken);
unset($emailstripe);
unset($calif);
unset($idtblcliente);
unset($idtblsistpago);
unset($emailmodificacion);
unset($resultado);
?>