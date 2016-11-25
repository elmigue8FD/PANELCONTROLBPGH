<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy='';
$nombreproveedor='';
$fchentre='';
$numproductpedidos='';
$numproductentregados='';
$status='';
$descripcion='';
$statusdeposito='';
$fchpagoproveedor='';
$srcimg1='';
$srcimg2='';
$emailcreo='';
$idtblordencompra='';
$idtblproveedor='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproveedor=$_POST["nombreproveedor"];
    $fchentre=$_POST["fchentre"];
    $numproductpedidos=$_POST["numproductpedidos"];
    $numproductentregados=$_POST["numproductentregados"];
    $status=$_POST["status"];
    $descripcion=$_POST["descripcion"];
    $statusdeposito=$_POST["statusdeposito"];
    $fchpagoproveedor=$_POST["fchpagoproveedor"];
    $srcimg1=$_POST["srcimg1"];
    $srcimg2=$_POST["srcimg2"];
    $emailcreo=$_POST["emailcreo"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $idtblproveedor=$_POST["idtblproveedor"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblentregaproducto($nombreproveedor, $fchentre,$numproductpedidos,$numproductentregados,$status,$descripcion,$statusdeposito,$fchpagoproveedor,$srcimg1,$srcimg2,$emailcreo,$idtblordencompra,$idtblproveedor);

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
unset($fchentre);
unset($numproductpedidos);
unset($numproductentregados);
unset($status);
unset($descripcion);
unset($statusdeposito);
unset($fchpagoproveedor);
unset($srcimg1);
unset($srcimg2);
unset($emailcreo);
unset($idtblordencompra);
unset($idtblproveedor);
unset($resultado);


?>