<?php
/**
 * Recursos utilizados
 */
require './models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$numproductos   = '';
$arealimitada   = '';
$hrsdeentrega   = '';
$numproductcomplem   = '';
$imgsproductos   = '';
$idtblpaquete   = '';
$activado       = '';
$idtblpais      = '';
$emailcreo      = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy   = $_POST["solicitadoBy"];
    $numproductos   = $_POST['numproductos'];
    $arealimitada   = $_POST['arealimitada'];
    $hrsdeentrega   = $_POST['hrsdeentrega'];
    $numproductcomplem   = $_POST['numproductcomplem'];
    $imgsproductos   = $_POST['imgsproductos'];
    $idtblpaquete   = $_POST['idtblpaquete'];
    $activado       = $_POST['activado'];
    $idtblpais      = $_POST['idtblpais'];
    $emailcreo      = $_POST['emailcreo'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTbldetallepaquete($numproductos,$arealimitada,$hrsdeentrega,$numproductcomplem,$imgsproductos,$idtblpaquete,$emailcreo);

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
unset($numproductos);
unset($arealimitada);
unset($hrsdeentrega);
unset($numproductcomplem);
unset($imgsproductos);
unset($idtblpaquete);
unset($activado);
unset($idtblpais);
unset($emailcreo);
unset($resultado);
?>