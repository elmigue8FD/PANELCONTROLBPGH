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
$idtblcarritoproduct='';
$cantidad= '';
$nombreproduct= '';
$nombreproveedor= '';
$precioreal= '';
$preciobp= '';
$personalizar= '';
$msjtarjeta= '';
$calif= '';
$emailmodifico= '';
$idtblordencompra= '';
$idtblproductdetalle= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblcarritoproduct=$_POST["idtblcarritoproduct"];
    $cantidad=$_POST['cantidad'];
	$nombreproduct=$_POST['nombreproduct'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$precioreal=$_POST['precioreal'];
    $preciobp=$_POST['preciobp'];
    $personalizar=$_POST['personalizar'];
    $msjtarjeta=$_POST['msjtarjeta'];
    $calif=$_POST['calif'];
    $emailmodifico=$_POST['emailmodifico'];
    $idtblordencompra=$_POST['idtblordencompra'];
    $idtblproductdetalle=$_POST['idtblproductdetalle'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcarritoproduct($idtblcarritoproduct,$cantidad,$nombreproduct,$nombreproveedor,$precioreal,$preciobp,$personalizar,$msjtarjeta,$calif,$emailmodifico,$idtblordencompra,$idtblproductdetalle);

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
unset($cantidad);
unset($nombreproduct);
unset($nombreproveedor);
unset($precioreal);
unset($preciobp);
unset($personalizar);
unset($msjtarjeta);
unset($calif);
unset($emailmodifico);
unset($idtblordencompra);
unset($idtblproductdetalle);
unset($resultado);
?>