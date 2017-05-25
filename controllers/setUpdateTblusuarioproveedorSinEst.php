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
$idtblusuarioproveedor='';
$nombreproveedor='';
$apellidoproveedor='';
$emailproveedor='';
$celularproveedor='';
$idtblproveedor='';
$idtblnivelacceso='';
$emailmodifico='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblusuarioproveedor=$_POST["idtblusuarioproveedor"];
    $nombreproveedor=$_POST["nombreproveedor"];
    $apellidoproveedor=$_POST["apellidoproveedor"];
    $emailproveedor=$_POST["emailproveedor"];
    $celularproveedor=$_POST["celularproveedor"];   
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtblnivelacceso=$_POST["idtblnivelacceso"];  
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblusuarioproveedorSinEst($idtblusuarioproveedor,$nombreproveedor,$apellidoproveedor,$emailproveedor,$celularproveedor,$idtblproveedor,$idtblnivelacceso,$emailmodifico);

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
unset($idtblusuarioproveedor);
unset($nombreproveedor);
unset($apellidoproveedor);
unset($emailproveedor);
unset($celularproveedor);
unset($idtblproveedor);
unset($idtblnivelacceso);
unset($emailmodifico);
unset($resultado);
?>