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
$idtblciudad='';
$idtbltipodeservicio='';
$fechapedido='';
$codipost='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblciudad=$_POST["idtblciudad"];
    $idtbltipodeservicio=$_POST["idtbltipodeservicio"];
    $fechapedido=$_POST["fechapedido"];
    $codipost=$_POST["codipost"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::gettblcoloniaByTblproveedor($idtblciudad,$idtbltipodeservicio,$fechapedido,$codipost);

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
unset($idtblciudad);
unset($idtbltipodeservicio);
unset($fechapedido);
unset($codipost);
unset($resultado);
?>