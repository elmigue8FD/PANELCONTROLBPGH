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
$nombrepaquete='';
$descripcion='';
$preciopaquete='';
$activado='';
$idtblmoduloventabp='';
$emailcreo='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $nombrepaquete=$_POST["nombrepaquete"];
    $descripcion=$_POST["descripcion"];
    $preciopaquete=$_POST["preciopaquete"];
    $activado=$_POST["activado"];
    $idtblmoduloventabp=$_POST["idtblmoduloventabp"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblpaquete($nombrepaquete,$descripcion,$preciopaquete,$activado,$idtblmoduloventabp,$emailcreo);

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
unset($nombrepaquete);
unset($descripcion);
unset($preciopaquete);
unset($activado);
unset($idtblmoduloventabp);
unset($emailcreo);
unset($resultado);
?>