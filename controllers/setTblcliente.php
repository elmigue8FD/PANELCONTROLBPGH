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
$clientenombre= '';
$clienteapellidos= '';
$clientecallenum= '';
$clientecolonia= '';
$clientecodipost= '';
$clientenacimiento= '';
$clientesexo= '';
$clientetelf= '';
$clienteext= '';
$clientecel= '';
$clienterfc= '';
$cedulafiscal='';
$clienteciudad= '';
$clientepais= '';
$nombencargadoemp= '';
$clienteemail= '';
$clienteactivado= '';
$clientepasswd= '';
$emailcreo= '';
$recibirinfo= '';
$idtipocliente= '';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy=$_POST["solicitadoBy"];
    $clientenombre=$_POST["clientenombre"];
    $clientecallenums=$_POST['clienteapellidos'];
    $clientecallenum=$_POST['clientecallenum'];
    $clientecolonia=$_POST['clientecolonia'];
    $clientecodipost=$_POST['clientecodipost'];
    $clientenacimiento=$_POST['clientenacimiento'];
    $clientesexo=$_POST['clientesexo'];
    $clientetelf=$_POST['clientetelf'];
    $clienteext=$_POST['clienteext'];
    $clientecel=$_POST['clientecel'];
    $clienterfc=$_POST['clienterfc'];
    $cedulafiscal=$_POST['clientecedulafiscal'];
    $clienteciudad=$_POST['clienteciudad'];
    $clientepais=$_POST['clientepais'];
    $nombencargadoemp=$_POST['nombencargadoemp'];
    $clienteemail=$_POST['clienteemail'];
    $clienteactivado=$_POST['clienteactivado'];
    $clientepasswd=$_POST['clientepasswd'];
    $emailcreo=$_POST['emailcreo'];
    $recibirinfo=$_POST['recibirinfo'];
    $idtipocliente=$_POST['idtipocliente'];
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setTblcliente($clientenombre, $clienteapellidos,$clientecallenum,$clientecolonia,$clientecodipost,$clientenacimiento,$clientesexo,$clientetelf,$clienteext,$clientecel,$clienterfc,$cedulafiscal,$clienteciudad,$clientepais,$nombencargadoemp,$clienteemail,$clienteactivado,$clientepasswd,$emailcreo,$recibirinfo,$idtipocliente);

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
unset($clientenombre);
unset($clienteapellidos);
unset($clientecallenum);
unset($clientecolonia);
unset($clientecodipost);
unset($clientenacimiento);
unset($clientesexo);
unset($clientetelf);
unset($clienteext);
unset($clientecel);
unset($clienterfc);
unset($clientecedulafiscal);
unset($clienteciudad);
unset($clientepais);
unset($nombencargadoemp);
unset($clienteemail);
unset($clienteactivado);
unset($clientepasswd);
unset($emailcreo);
unset($recibirinfo);
unset($idtipocliente);
unset($resultado);
?>