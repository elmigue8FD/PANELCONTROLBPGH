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
$idtblpreproveedor='';
$nombreusuarioproveedor='';
$srcidentificacion='';
$direccionusuario='';
$telefono1='';
$telefeno2='';
$email='';
$nombre='';
$direccion='';
$ciudad='';
$tipopedido='';
$hrasprovtienda='';
$hrasprovdom='';
$emailmodifico='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $idtblpreproveedor=$_POST["idtblpreproveedor"];
    $nombreusuarioproveedor=$_POST["nombreusuarioproveedor"];
    $srcidentificacion=$_POST["srcidentificacion"];
    $direccionusuario=$_POST["direccionusuario"];
    $telefono1=$_POST["telefono1"];
    $telefeno2=$_POST["telefeno2"];
    $email=$_POST["email"];
    $nombre=$_POST["nombre"];
    $direccion=$_POST["direccion"];
    $ciudad=$_POST["ciudad"];
    $tipopedido=$_POST["tipopedido"];
    $hrasprovtienda=$_POST["hrasprovtienda"];
    $hrasprovdom=$_POST["hrasprovdom"];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblpreproveedor($idtblpreproveedor,$nombreusuarioproveedor,$srcidentificacion,$direccionusuario,$telefono1,$telefeno2,$email,$nombre,$direccion,$ciudad,$tipopedido,$hrasprovtienda,$hrasprovdom,$emailmodifico);

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
unset($idtblpreproveedor);
unset($nombreusuarioproveedor);
unset($srcidentificacion);
unset($precipoaquete);
unset($direccionusuario);
unset($telefono1);
unset($telefeno2);
unset($email);
unset($nombre);
unset($direccion);
unset($ciudad);
unset($tipopedido);
unset($hrasprovtienda);
unset($hrasprovdom);
unset($emailmodifico);
unset($resultado);
?>