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
$nombreproductcomplem='';
$descripcion='';
$seo='';
$precioreal='';
$preciobp='';
$srcimg='';
$activado='';
$idtblproveedor='';
$stock='';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproductcomplem=$_POST["nombreproductcomplem"];
    $descripcion=$_POST["descripcion"];
    $seo=$_POST["seo"];
    $precioreal=$_POST["precioreal"];
    $preciobp=$_POST["preciobp"];
    //$preciobp=round(($preciobp1*0.045+4)*1.16);     	
    $srcimg=$_POST["srcimg"];
    $activado=$_POST["activado"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $stock=$_POST["stock"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblproductcomplem($nombreproductcomplem, $descripcion, $seo, $precioreal, $preciobp, $srcimg,$activado,$idtblproveedor,$stock,$emailcreo);

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
unset($nombreproductcomplem);
unset($descripcion);
unset($seo);
unset($precioreal);
unset($preciobp);
unset($srcimg);
unset($activado);
unset($idtblproveedor);
unset($stock);
unset($emailcreo);
unset($resultado);
?>