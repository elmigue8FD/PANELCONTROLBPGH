<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy='';
$nombrepais='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST))
{
	$solicitadoBy	= $_POST["solicitadoBy"];		
	$nombrepais		= $_POST['nombrepais'];
	/**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
	$resultado = FuncionesBePickler::getCheckTblpais($nombrepais);
	//SI LA CONSULTA FUE CORRECTA LLAMAMOS AL A FUNCION SOLICITADABY SI NO A LA FUNCION SINDATOS QUE MANDARA MENSAJE DE ERROR
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
unset($nombrepais);
unset($resultado);
?>