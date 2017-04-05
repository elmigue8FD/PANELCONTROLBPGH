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
$cupondescuento= '';
$descuento= '';
$idtblcliente= '';
$idtblordencompra= '';
$emailcreo= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $cupondescuento=$_POST["cupondescuento"];
    $descuento=$_POST["descuento"];
    $idtblcliente=$_POST["idtblcliente"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblhistcupondescuento($cupondescuento, $descuento,$idtblcliente,$idtblordencompra,$emailcreo);

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
unset($codigo);
unset($descuento);
unset($puntoscliente);
unset($activado);
unset($idtblcliente);
unset($emailcreo);
unset($resultado);
?>