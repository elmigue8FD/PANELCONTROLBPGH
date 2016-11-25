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
$nombremodulo='';
$nombrepaquete='';
$statuspagado='';
$sistemapago='';
$facturacion='';
$token='';
$emailtoken='';
$nombreusuarioprov='';
$direccionusuarioprov='';
$email='';
$ciudad='';
$telefono='';
$idtblpaquete='';
$idtblpreproveedor='';
$emailcreo='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $nombremodulo=$_POST["nombremodulo"];
    $nombrepaquete=$_POST["nombrepaquete"];
    $statuspagado=$_POST["statuspagado"];
    $sistemapago=$_POST["sistemapago"];
    $facturacion=$_POST["facturacion"];
    $token=$_POST["token"];
    $emailtoken=$_POST["emailtoken"];
    $nombreusuarioprov=$_POST["nombreusuarioprov"];
    $direccionusuarioprov=$_POST["direccionusuarioprov"];
    $email=$_POST["email"];
    $ciudad=$_POST["ciudad"];
    $telefono=$_POST["telefono"];
    $idtblpaquete=$_POST["idtblpaquete"];
    $idtblpreproveedor=$_POST["idtblpreproveedor"];
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblordenpaquete($nombremodulo,$nombrepaquete,$precipoaquete,$statuspagado,$sistemapago,$facturacion,$token,$emailtoken,$nombreusuarioprov,$direccionusuarioprov,$email,$ciudad,$telefono,$idtblpaquete,$idtblpreproveedor,$emailcreo);

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
unset($nombremodulo);
unset($nombrepaquete);
unset($precipoaquete);
unset($statuspagado);
unset($sistemapago);
unset($facturacion);
unset($token);
unset($emailtoken);
unset($nombreusuarioprov);
unset($direccionusuarioprov);
unset($email);
unset($ciudad);
unset($telefono);
unset($idtblpaquete);
unset($idtblpreproveedor);
unset($emailcreo);
unset($resultado);
?>