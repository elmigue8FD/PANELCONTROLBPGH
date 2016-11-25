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
$emailcreo='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
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
    $emailcreo=$_POST["emailcreo"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblpreproveedor($nombreusuarioproveedor,$srcidentificacion,$direccionusuario,$telefono1,$telefeno2,$email,$nombre,$direccion,$ciudad,$tipopedido,$hrasprovtienda,$hrasprovdom,$emailcreo);

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
unset($emailcreo);
unset($resultado);
?>