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
$tipopedido='';
$cantidad= '';
$emailmodifico= '';
$idtblcarritoproduct= '';
$idtblproductdetalle= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $tipopedido = $_POST["tipopedido"];
    $cantidad=$_POST['cantidad'];
    $emailmodifico=$_POST['emailmodifico'];
    $idtblcarritoproduct=$_POST['idtblcarritoproduct'];
    $idtblproductdetalle=$_POST['idtblproductdetalle'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setDeleteTCPAndsetUpdateTP($tipopedido,$cantidad,$idtblcarritoproduct,$idtblproductdetalle,$emailmodifico);

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
unset($tipopedido);
unset($cantidad);
unset($nombreproduct);
unset($nombreproveedor);
unset($precioreal);
unset($preciobp);
unset($personalizar);
unset($msjtarjeta);
unset($calif);
unset($emailcreo);
unset($idtblordencompra);
unset($idtblproductdetalle);
unset($resultado);
?>