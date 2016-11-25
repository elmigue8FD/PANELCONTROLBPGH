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
$idtblcarritoproductcomplem='';
$cantidad= '';
$nombreproductcom= '';
$nombreproveedor= '';
$precioreal= '';
$preciobp= '';
$emailmodifico= '';
$idtblordencompra= '';
$idtblproductcomplem= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $cantidad=$_POST['cantidad'];
	$nombreproductcom=$_POST['nombreproductcom'];
	$nombreproveedor=$_POST['nombreproveedor'];
	$precioreal=$_POST['precioreal'];
    $preciobp=$_POST['preciobp'];
    $personalizar=$_POST['personalizar'];
    $emailcreo=$_POST['emailcreo'];
    $idtblordencompra=$_POST['idtblordencompra'];
    $idtblproductcomplem=$_POST['idtblproductcomplem'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcarritoproductcomplem($idtblcarritoproductcomplem,$cantidad,$nombreproductcom,$nombreproveedor,$precioreal,$preciobp,$emailmodifico,$idtblordencompra,$idtblproductcomplem);

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
unset($idtblcarritoproductcomplem);
unset($cantidad);
unset($nombreproduct);
unset($nombreproveedor);
unset($precioreal);
unset($preciobp);
unset($emailcreo);
unset($idtblordencompra);
unset($idtblproductcomplem);
unset($resultado);
?>