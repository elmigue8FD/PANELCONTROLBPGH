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
$idtblproductdetalle='';
$activado='';
$emailusuamodifico='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblproductdetalle=$_POST["idtblproductdetalle"];
    $activado=$_POST["activado"];
    $emailusuamodifico=$_POST["emailusuamodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproductDetalleActivar($idtblproductdetalle,$activado,$emailusuamodifico);
    $resultado=$solicitadoBy.' '.$idtblproductdetalle.' '.$activado.' '.$emailusuamodifico.' ';
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
unset($idtblproductdetalle);
unset($activado);
unset($emailusuamodifico);
unset($resultado);
?>