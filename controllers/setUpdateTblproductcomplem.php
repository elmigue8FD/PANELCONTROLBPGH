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
$idtblproductcomplem= '';
$nombreproductcomplem='';
$descripcion='';
$seo='';
$precioreal='';
$preciobp1='';
$srcimg='';
$activado='';
$idtblproveedor='';
$stock='';
$emailmodifico= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblproductcomplem=$_POST["idtblproductcomplem"];
    $nombreproductcomplem=$_POST["nombreproductcomplem"];
    $descripcion=$_POST["descripcion"];
    $seo=$_POST["seo"];
    $precioreal=$_POST["precioreal"];
    $preciobp1=$_POST["preciobp"];
	$preciobp2=($preciobp1*0.045+4)*1.16;	
    $preciobp=$precioreal+round($preciobp2);
	
    $srcimg=$_POST["srcimg"];
    $activado=$_POST["activado"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $stock=$_POST["stock"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproductcomplem($idtblproductcomplem,$nombreproductcomplem, $descripcion, $seo, $precioreal, $preciobp, $srcimg,$activado,$idtblproveedor,$stock,$emailmodifico);

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
unset($idtblproductcomplem);
unset($nombreproductcomplem);
unset($descripcion);
unset($seo);
unset($precioreal);
unset($preciobp);
unset($preciobp1);
unset($preciobp2);
unset($srcimg);
unset($activado);
unset($idtblproveedor);
unset($stock);
unset($emailmodifico);
unset($resultado);
?>