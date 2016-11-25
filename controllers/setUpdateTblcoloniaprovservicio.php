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
$idtblcoloniprovserv='';
$idtblproveedor= '';
$idtblcolonia= '';
$emailmodifico= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblcoloniprovserv=$_POST["idtblcoloniprovserv"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtblcolonia=$_POST["idtblcolonia"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcoloniaprovservicio($idtblcoloniprovserv,$idtblproveedor, $idtblcolonia ,$emailmodifico);

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
unset($idtblcoloniprovserv);
unset($idtblproveedor);
unset($idtblcolonia);
unset($emailmodifico);
unset($resultado);
?>