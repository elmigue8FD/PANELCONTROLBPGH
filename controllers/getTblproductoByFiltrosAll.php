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
$idtblcolonia='';
$idtbltipodeservicio='';
$fechapedido='';
$hora='';
$idtblcategproduct='';
$idtblclasifproduct='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblcolonia=$_POST["idtblcolonia"];
    $idtbltipodeservicio=$_POST["idtbltipodeservicio"];
    $fechapedido=$_POST["fechapedido"];
    $hora=$_POST["hora"];
    $idtblcategproduct=$_POST["idtblcategproduct"];
    $idtblclasifproduct=$_POST["idtblclasifproduct"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblproductoByFiltrosAll($idtblcolonia,$idtbltipodeservicio,$fechapedido,$hora,$idtblcategproduct,$idtblclasifproduct);

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
unset($idtblcolonia);
unset($idtbltipodeservicio);
unset($fechapedido);
unset($hora);
unset($idtblcategproduct);
unset($idtblclasifproduct);
unset($resultado);
?>