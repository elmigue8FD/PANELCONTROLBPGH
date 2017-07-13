<?php 
//Recursos utilizados
require './../models/FuncionesBePickler.php'; //lLama el modelo
require './InfoSolicitadaBy.php'; //Este info es el encargado de retornar tal cual la respuesta
/**
 * Variables Utilizadas
 */
$solicitadoBy= ''; //Esta SIEMPRE va
$fchinicio='';
$fchfinal='';
$resultado= ''; //Siempre se queda
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){ //Valida la función que no esté vacía

	$solicitadoBy=$_POST["solicitadoBy"]; //Siempre va
    $fchinicio=$_POST["fchinicio"]; //El que lleva $ es el que está dentro del archivo, el otro es cómo va en el post
	$fchfinal=$_POST["fchfinal"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblOrdenCompraGrafico($fchinicio, $fchfinal);

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
 * Destruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($fchinicio);
unset($fchfinal);
unset($resultado);
?>
