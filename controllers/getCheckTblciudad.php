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
$activado       = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
	$solicitadoBy	= $_POST["solicitadoBy"];
	$nombreciudad	= $_POST['nombreciudad'];
    $idtblpais      = $_POST['idtblpais'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::getCheckTblciudad($nombreciudad, $idtblpais);

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
unset($nombrepais);
unset($idioma);
unset($activado);
unset($emailcreo);
unset($resultado);
?>