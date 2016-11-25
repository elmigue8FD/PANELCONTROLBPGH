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
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
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
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblordencompra($fchordencompra, $toralorden,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion,$stripentoken,$emailstripe,$calif,$idtblcliente,$idtblsistpago,$emailcreo);

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
unset($emailcreo);
unset($resultado);
?>