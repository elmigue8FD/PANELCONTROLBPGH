<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$idtblpais     	= '';
$resultado			= '';
/**
 * Validar si tiene valores el array $_POST 
 */
if (!empty($_POST)){
	$solicitadoBy	= $_POST["solicitadoBy"];
    $idtblpais     =$_POST['idtblpais'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getTblpais($idtblpais);

    if($resultado)
    {
    	/**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitaBy, $resultado);

    }else{
    	/**
         * Si fallo manda a la función de fallo a quien lo solicito.
         */
    	InfoSolicitadaBy::sinDatos($solicitaBy);
    }
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($idtblpais);
unset($resultado);

?>