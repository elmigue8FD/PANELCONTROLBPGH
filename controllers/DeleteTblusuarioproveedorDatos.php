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
$emailproveedor='';
$celularproveedor='';
$activado='';
$emailmodifico='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblusuarioproveedor=$_POST["idtblusuarioproveedor"];    
    $emailproveedor=$_POST["emailproveedor"];
    $celularproveedor=$_POST["celularproveedor"];
    $activado=$_POST["activado"];   
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::DeleteTblusuarioproveedorDatos($idtblusuarioproveedor,$emailproveedor,$celularproveedor,$activado,$emailmodifico);

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
unset($emailproveedor);
unset($celularproveedor);
unset($activado);
unset($emailmodifico);
unset($resultado);
?>