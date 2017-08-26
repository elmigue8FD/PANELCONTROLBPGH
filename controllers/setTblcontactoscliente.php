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
$nombrecompleto= '';
$email= '';
$parentesco= '';
$fchnacimiento= '';
$idtblcliente= '';
$emailcreo= '';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombrecompleto=$_POST["nombrecompleto"];
    $email=$_POST["email"];
    $parentesco=$_POST["parentesco"];
    $fchnacimiento=$_POST["fchnacimiento"];
    $idtblcliente=$_POST["idtblcliente"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblcontactoscliente($nombrecompleto,$email,$parentesco,$fchnacimiento,$idtblcliente,$emailcreo);

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
unset($nombrecompleto);
unset($email);
unset($parentesco);
unset($fchnacimiento);
unset($idtblcliente);
unset($emailcreo);
unset($resultado);
?>