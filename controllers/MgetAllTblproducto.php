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
    
    /*
    $idtblpais=$_POST["idtblpais"];
    $idtblciudad=$_POST["idtblciudad"];
    $idtblcolonia=$_POST["idtblcolonia"];
    $idtblsemana=$_POST["idtblsemana"];
    $diaselaboracion=$_POST["diaselaboracion"];
    $idtbltiposervicio=$_POST["idtbltiposervicio"];
    $hora=$_POST["hora"];
    $hora=$hora/24;
    $solicitadoBy=$_POST["solicitadoBy"];
    */
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    
    //echo ' idtblpais::'.$idtblpais.' idtblciudad::'.$idtblciudad.' idtblcolonia::'.$idtblcolonia.' idtblsemana::'.$idtblsemana.' diaselaboracion::'.$diaselaboracion.' idtbltiposervicio::'.$idtbltiposervicio.' hora::'.$hora;
    //$resultado = FuncionesBePickler::MgetAllTblproducto($idtblciudad,$idtbltiposervicio,$diaselaboracion,$idtblcolonia);
    $resultado = FuncionesBePickler::MgetAllTblproducto($idtblpais,$idtblciudad,$idtblcolonia,$idtblsemana,$diaselaboracion,$idtbltiposervicio,$hora);
    //echo 'idtblciudad::'.$idtblciudad.' idtbltiposervicio::'.$idtbltiposervicio.' diaselaboracion::'.$diaselaboracion.' idtblcolonia::'.$idtblcolonia;
    /*var_dump($resultado);
    exit();
    */
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