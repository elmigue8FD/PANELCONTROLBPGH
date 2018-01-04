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
$nombreprov='';
$srclogo='';
$descripcion='';
$direccion='';
$seo='';
$telftienda='';
$extencion='';
$celular='';
$email='';
$rfc='';
$clave='';
$banco='';
$titular='';
$activado='';
$idtbltipopedido='';
$idtbltiposervicio='';
$idtblcolonia='';
$idtblpaquete='';
$emailcreo='';
$correoacceseo='';
$contasenia='';
$nombreduenio='';
$apellidoduenio='';
$idtblnivelacceso='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 
 
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreprov=$_POST["nombreprov"];
    $srclogo=$_POST["srclogo"];
    $descripcion=$_POST["descripcion"];
    $direccion=$_POST["direccion"];
    $seo=$_POST["seo"];
    $telftienda=$_POST["telftienda"];
    $extencion=$_POST["extencion"];
    $celular=$_POST["celular"];
    $email=$_POST["email"];
    $rfc=$_POST["rfc"];
    $clave=$_POST["clave"];
    $banco=$_POST["banco"];
    $titular=$_POST["titular"];
    $activado=$_POST["activado"];
    $idtbltipopedido=$_POST["idtbltipopedido"];
    $idtbltiposervicio=$_POST["idtbltiposervicio"];
    $idtblcolonia=$_POST["idtblcolonia"];
	$idtblpaquete=$_POST["idtblpaquete"];
    $emailcreo=$_POST["emailcreo"];
    $correoacceseo=$_POST["email"];
    $contasenia=$_POST["contrasenia"];
    $nombreduenio=$_POST["nombreduenio"];
    $apellidoduenio=$_POST["apellidoduenio"];
    $idtblnivelacceso=$_POST["nivelacceso"];
   // $direccion=$_POST["direccion"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.                               

	 */

    $contasenia = md5($contasenia);



    $resultado = FuncionesBePickler::setTblproveedorAndTblusuarioproveedor($nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$rfc,$clave,$banco,$titular,$activado,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailcreo,$correoacceseo,$contasenia,$nombreduenio,$apellidoduenio,$idtblnivelacceso);

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
unset($nombreprov);
unset($srclogo);
unset($descripcion);
unset($direccion);
unset($seo);
unset($telftienda);
unset($extencion);
unset($celular);
unset($email);
unset($rfc);
unset($clave);
unset($banco);
unset($titular);
unset($activado);
unset($idtbltipopedido);
unset($idtbltiposervicio);
unset($idtblcolonia);
unset($idtblpaquete);
unset($emailcreo);
unset($resultado);
unset($correoacceseo);
unset($contasenia);
unset($nombreduenio);
unset($apellidoduenio);
unset($idtblnivelacceso);
unset($resultado);
?>