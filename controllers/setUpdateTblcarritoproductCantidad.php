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
$casoAddDiss='';
$cantidad= '';
$emailmodifico= '';
$idtblordencompra= '';
$idtblproductdetalle= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $casoAddDiss=$_POST["casoAddDiss"];
    $cantidad=$_POST['cantidad'];
    $emailmodifico=$_POST['emailmodifico'];
    $idtblordencompra=$_POST['idtblordencompra'];
    $idtblproductdetalle=$_POST['idtblproductdetalle'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcarritoproductCantidad($casoAddDiss,$cantidad,$emailmodifico, $idtblordencompra,$idtblproductdetalle);

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
unset($casoAddDiss);
unset($emailmodifico);
unset($idtblordencompra);
unset($idtblproductdetalle);
unset($resultado);
?>