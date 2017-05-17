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
$tipo='';
$asunto='';
$mensaje='';
$emisor='';
$emailcreo='';
$idredireccion='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $tipo=$_POST["tipo"];
    $asunto=$_POST["asunto"];
    $mensaje=$_POST["mensaje"];
    $emisor=$_POST["emisor"];
	$idredireccion=$_POST["idredireccion"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */                            
    $resultado = FuncionesBePickler::setTblnotificacion1($tipo,$asunto,$mensaje,$emisor,$emailcreo,$idredireccion);

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
unset($tipo);
unset($asunto);
unset($mensaje);
unset($emisor);
unset($idredireccion);
unset($emailcreo);  
unset($resultado);
?>