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
$idtblproducto='';
$nombreproduct='';
$descripcion='';
$ingredientes='';
$seo='';
$promcalif='';
$activado='';
$idtblproveedor='';
$idtblcategproduc='';
$idtblclasifproduct='';
$emailmodifico= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblproducto=$_POST["idtblproducto"];
    $nombreproduct=$_POST["nombreproduct"];
    $descripcion=$_POST["descripcion"];
    $ingredientes=$_POST["ingredientes"];
    $seo=$_POST["seo"];
    $promcalif=$_POST["promcalif"];
    $activado=$_POST["activado"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtblcategproduc=$_POST["idtblcategproduc"];
    $idtblclasifproduct=$_POST["idtblclasifproduct"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproducto($idtblproducto,$nombreproduct,$descripcion,$ingredientes,$seo,$promcalif,$activado,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct,$emailmodifico);

    $respuesta["success"] = $activado;
    echo  json_encode($respuesta);
    if($resultado)
    {
        /**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	//InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

    }else
    {
        /**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
    	//InfoSolicitadaBy::sinDatos($solicitadoBy);
    }
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($idtblproducto);
unset($nombreproduct);
unset($descripcion);
unset($ingredientes);
unset($seo);
unset($promcalif);
unset($activado);
unset($idtblproveedor);
unset($idtblcategproduc);
unset($idtblclasifproduct);
unset($emailmodifico);
unset($resultado);
?>