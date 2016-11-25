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
$idcodigo= '';
$codigo= '';
$descuento= '';
$puntoscliente= '';
$activado= '';
$idtblcliente= '';
$emailmodifico= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idcodigo=$_POST["idcodigo"];
    $codigo=$_POST["codigo"];
    $descuento=$_POST["descuento"];
    $puntoscliente=$_POST["puntoscliente"];
    $activado=$_POST["activado"];
    $idtblcliente=$_POST["idtblcliente"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcupondescuento($idcodigo, $codigo, $descuento, $puntoscliente, $activado, $idtblcliente, $emailmodifico);

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
unset($idcodigo);
unset($codigo);
unset($descuento);
unset($puntoscliente);
unset($activado);
unset($idtblcliente);
unset($emailmodifico);
unset($resultado);
?>