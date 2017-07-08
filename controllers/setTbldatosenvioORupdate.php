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
$tipodepedido= '';
$tiposervicio= '';
$calle= '';
$numint= '';
$fchagendado= '';
$hragendado= '';
$numext= '';
$colonia= '';
$ciudad= '';
$pais= '';
$codipost= '';
$nombreempresa= '';
$rfc= '';
$nombrerecibe= '';
$celularrecibe= '';
$referencia1= '';
$referencia2= '';
$emailcreo= '';
$idtblordencompra= '';
$clavemsg='';
$msg='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){



	$solicitadoBy=$_POST["solicitadoBy"];
    $tipodepedido=$_POST["tipodepedido"];
    $tiposervicio=$_POST["tiposervicio"];
    $calle=$_POST["calle"];
    $numint=$_POST["numint"];
    $fchagendado=$_POST["fchagendado"];
    $hragendado=$_POST["hragendado"];
    $numext=$_POST["numext"];
    $colonia=$_POST["colonia"];
    $ciudad=$_POST["ciudad"];
    $pais=$_POST["pais"];
    $codipost=$_POST["codipost"];
    $nombreempresa=$_POST["nombreempresa"];
    $rfc=$_POST["rfc"];
    $nombrerecibe=$_POST["nombrerecibe"];
    $celularrecibe=$_POST["celularrecibe"];
    $referencia1=$_POST["referencia1"];
    $referencia2=$_POST["referencia2"];
    $emailcreo=$_POST["emailcreo"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $clavemsg=$_POST["clavemsg"];
    $msg=$_POST["msg"];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTbldatosenvioORupdate($tipodepedido,$tiposervicio,$calle,$numint,$fchagendado,$hragendado,$numext,$colonia,$ciudad,$pais,$codipost,$nombreempresa,$rfc,$nombrerecibe,$celularrecibe,$referencia1,$referencia2,$emailcreo,$idtblordencompra,$clavemsg,$msg);

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
unset($tipodepedido);
unset($tiposervicio);
unset($calle);
unset($numint);
unset($fchagendado);
unset($hragendado);
unset($numext);
unset($colonia);
unset($ciudad);
unset($pais);
unset($codipost);
unset($nombreempresa);
unset($rfc);
unset($nombrerecibe);
unset($celularrecibe);
unset($referencia1);
unset($referencia2);
unset($emailcreo);
unset($idtblordencompra);
unset($resultado);
?>