<?php
require './Msession.php';
//session_start();
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
$totaldelivery='';
$statuspagado='';
$nombrecliente='';
$sistemapago='';
$facturacion='';
$devolucion='';
$stripentoken='';
$emailstripe='';
$calif='';
$ordencompracliente='';
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
    $totaldelivery= $_POST["totaldelivery"];
    $statuspagado=$_POST["statuspagado"];
    $nombrecliente=$_POST["nombrecliente"];
    $sistemapago=$_POST["sistemapago"];
    $facturacion=$_POST["facturacion"];
    $devolucion=$_POST["devolucion"];
    $stripentoken=$_POST["stripentoken"];
    $emailstripe=$_POST["emailstripe"];
    $calif=$_POST["calif"];
    $ordencompracliente=$_POST["ordencompracliente"]; 
    $idtblcliente=$_POST["idtblcliente"];
    $idtblsistpago=$_POST["idtblsistpago"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    if(!isset($_SESSION["idtblordencompra"]))
    {   
        $resultado = FuncionesBePickler::setTblordencompra($fchordencompra, $toralorden,$totaldelivery,$statuspagado,$nombrecliente,$sistemapago,$facturacion,$devolucion
            ,$stripentoken,$emailstripe,$calif,$ordencompracliente,$idtblcliente,$idtblsistpago,$emailcreo);
    }else
    {
        $resultado=$_SESSION["idtblordencompra"];
    }
    if($resultado)
    {
        $_SESSION["idtblordencompra"]=$resultado;
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
unset($totaldelivery);
unset($statuspagado);
unset($nombrecliente);
unset($sistemapago);
unset($facturacion);
unset($devolucion);
unset($stripentoken);
unset($emailstripe);
unset($calif);
unset($ordencompracliente);
unset($idtblcliente);
unset($idtblsistpago);
unset($emailcreo);
unset($resultado);
?>