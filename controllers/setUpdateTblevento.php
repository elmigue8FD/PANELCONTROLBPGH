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
$idtblevento='';
$nombreevento='';
$descripcion='';
$srcimg='';
$activado='';
$emailmodifico='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblevento=$_POST["idtblevento"];
    $nombreevento=$_POST["nombreevento"];
    $descripcion=$_POST["descripcion"];
    $srcimg=$_POST["srcimg"];
    $activado=$_POST["activado"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblevento($idtblevento,$nombreevento,$descripcion,$srcimg,$activado,$emailmodifico);

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
unset($idtblevento);
unset($nombreevento);
unset($descripcion);
unset($srcimg);
unset($activado);
unset($emailmodifico);
unset($resultado);
?>