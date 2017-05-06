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
$idtblproveedor='';
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
$idtbltipopedido='';
$idtbltiposervicio='';
$idtblcolonia='';
$emailmodifico='';
$resultado= '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $idtblproveedor=$_POST["idtblproveedor"];
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
    $idtbltipopedido=$_POST["idtbltipopedido"];
    $idtbltiposervicio=$_POST["idtbltiposervicio"];
    $idtblcolonia=$_POST["idtblcolonia"];
    $idtblpaquete=$_POST['idtblpaquete'];
    $emailmodifico=$_POST["emailmodifico"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblproveedor2($idtblproveedor,$nombreprov,$srclogo,$descripcion,$direccion,$seo,$telftienda,$extencion,$celular,$email,$rfc,$clave,$banco,$titular,$idtbltipopedido,$idtbltiposervicio,$idtblcolonia,$idtblpaquete,$emailmodifico);

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
unset($idtblproveedor);
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
unset($idtbltipopedido);
unset($idtbltiposervicio);
unset($idtblcolonia);
unset($emailmodifico);
unset($resultado);
?>