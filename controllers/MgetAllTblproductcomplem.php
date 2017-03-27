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
$resultado='';
$idtblciudad='';
$idtbltiposervicio='';
$diaselaboracion='';
$idtblcolonia='';

$idtblpais='';
$hora='';
$idtblsemana='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){
    $idtblpais=!empty($_POST['idtblpais']) ? $_POST['idtblpais'] : '';
    $idtblciudad=!empty($_POST['idtblciudad']) ? $_POST['idtblciudad'] : '';
    $idtblcolonia=!empty($_POST['idtblcolonia']) ? $_POST['idtblcolonia'] : '';
    $idtblsemana=!empty($_POST['idtblsemana']) ? $_POST['idtblsemana'] : '';
    $diaselaboracion=!empty($_POST['diaselaboracion']) ? $_POST['diaselaboracion'] : '';
    $idtbltiposervicio=!empty($_POST['idtbltiposervicio']) ? $_POST['idtbltiposervicio'] : '';
    $hora=!empty($_POST['hora']) ? $_POST['hora'] : '';
    $hora=!empty($hora) ? $hora/24 : '';    
    $solicitadoBy=!empty($_POST['solicitadoBy']) ? $_POST['solicitadoBy'] : '';
    
    $resultado = FuncionesBePickler::MgetAllTblproductcomplem($idtblpais,$idtblciudad,$idtblcolonia,$idtblsemana,$diaselaboracion,$idtbltiposervicio,$hora);
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
unset($resultado);
?>