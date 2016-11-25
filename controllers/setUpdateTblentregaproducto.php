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
$nombreproveedor='';
$fchentrega='';
$numproductpedidos='';
$numproductentregados='';
$status='';
$statusdeposito='';
$fchpagoproveedor='';
$srcimg1='';
$srcimg2='';
$emailmodifico='';
$idtblordencompra='';
$idtblproveedor='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproveedor=$_POST["nombreproveedor"];
    $fchentrega=$_POST["fchentrega"];
    $numproductpedidos=$_POST["numproductpedidos"];
    $numproductentregados=$_POST["numproductentregados"];
    $status=$_POST["status"];
    $statusdeposito= $_POST["statusdeposito"]; 
    $fchpagoproveedor=$_POST["fchpagoproveedor"];
    $srcimg1=$_POST["srcimg1"];
    $srcimg2=$_POST["srcimg2"];
    $emailmodifico=$_POST["emailmodifico"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $idtblproveedor=$_POST["idtblproveedor"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblentregaproducto($nombreproveedor,$fchentrega,$numproductpedidos,$numproductentregados,$status,$statusdeposito,$fchpagoproveedor,$srcimg1,$srcimg2,$emailmodifico,$idtblordencompra,$idtblproveedorr);

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
unset($nombreproveedor);
unset($fchentrega);
unset($numproductpedidos);
unset($numproductentregados);
unset($status);
unset($fchpagoproveedor);
unset($srcimg1);
unset($srcimg2);
unset($emailmodifico);
unset($idtblordencompra);
unset($idtblproveedor);
unset($resultado);
?>