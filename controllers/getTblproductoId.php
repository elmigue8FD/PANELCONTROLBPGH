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
$nombreproduct='';
$descripcion='';
$ingredientes='';
$seo='';
$promcalif='';
$activado='';
$idtblproveedor='';
$idtblcategproduc='';
$idtblclasifproduct='';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproduct=$_POST["nombreproduct"];
    $descripcion=$_POST["descripcion"];
    $ingredientes=$_POST["ingredientes"];
    $seo=$_POST["seo"];
    $promcalif=$_POST["promcalif"];
    $activado=$_POST["activado"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtblcategproduc=$_POST["idtblcategproduc"];
    $idtblclasifproduct=$_POST["idtblclasifproduct"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblproductoId($nombreproduct, $descripcion,$ingredientes,$seo,$promcalif,$activado,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct,$emailcreo);

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
unset($nombreproduct);
unset($descripcion);
unset($ingredientes);
unset($seo);
unset($promcalif);
unset($activado);
unset($idtblproveedor);
unset($idtblcategproduc);
unset($idtblclasifproduct);
unset($emailcreo);
unset($resultado);
?>