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
$idtbldiaprovservicio='';
$idtblproveedor='';
$idtbldiasemana='';
$emailmodifico='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtbldiaprovservicio=$_POST["idtbldiaprovservicio"];
    $idtblproveedor=$_POST["idtblproveedor"];
    $idtbldiasemana=$_POST["idtbldiasemana"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTbldiaprovservicio($idtbldiaprovservicio,$idtblproveedor,$idtbldiasemana,$emailmodifico);

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
unset($idtbldiaprovservicio);
unset($idtblproveedor);
unset($idtbldiasemana);
unset($emailmodifico);
unset($resultado);
?>