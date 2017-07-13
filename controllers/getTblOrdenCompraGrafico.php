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
if (!empty($_POST)){ //Valida la funci�n que no est� vac�a

	$solicitadoBy=$_POST["solicitadoBy"]; //Siempre va
    $fchinicio=$_POST["fchinicio"]; //El que lleva $ es el que est� dentro del archivo, el otro es c�mo va en el post
	$fchfinal=$_POST["fchfinal"];
    /**
     * Mandamos los par�metros y llamamos a la funci�n que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblOrdenCompraGrafico($fchinicio, $fchfinal);

    if($resultado)
    {
        /**
         * Si es �xitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy, $resultado);

    }else
    {
        /**
         * Si fallo manda a la funci�n de fallo a quien lo solicito.
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
