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
$idtblproveedor='';
$idtblcategproduc='';
$idtblclasifproduct='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproduct=$_POST["nombreproduct"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtblcategproduc=$_POST["idtblcategproduc"];
    $idtblclasifproduct=$_POST["idtblclasifproduct"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setCheckTblproducto($nombreproduct,$idtblproveedor,$idtblcategproduc,$idtblclasifproduct);

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
unset($resultado);
?>