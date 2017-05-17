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
$nombreciudad   = '';
$idtblpais      = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
	$solicitadoBy	= $_POST["solicitadoBy"];
	$nombreciudad	= $_POST["nombreciudad"]; 
    $idtblpais      = $_POST["idtblpais"];   
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getCheckTblciudad1($nombreciudad, $idtblpais);

    if($resultado)    
    {
    	/**
         * Si es éxitos le mandamos los resultados a quien lo solicito.
         */
    	InfoSolicitadaBy::solicitadaby($solicitadoBy,$resultado);

    }else{
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
unset($nombreciudad);
unset($idtblpais);
unset($resultado);
?>