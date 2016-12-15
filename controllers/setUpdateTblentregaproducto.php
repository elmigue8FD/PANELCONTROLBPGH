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
$nombreproveedor='';
$fchentrega='';
$numproductpedidos='';
$numproductentregados='';
$status='';
$fchpagoproveedor='';
$srcimg1='';
$srcimg2='';
$emailmodifico='';
$idtblordencompra='';
$idtblproveedor='';
$resultado='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

	$solicitadoBy=$_POST["solicitadoBy"];
    $nombreproveedor=$_POST["nombreproveedor"];
    $fchentrega=$_POST["fchentrega"];
    $numproductpedidos=$_POST["numproductpedidos"];
    $numproductentregados=$_POST["numproductentregados"];
    $status=$_POST["status"];
    $fchpagoproveedor=$_POST["fchpagoproveedor"];
    $srcimg1=$_POST["srcimg1"];
    $srcimg2=$_POST["srcimg2"];
    $emailmodifico=$_POST["emailmodifico"];
    $idtblordencompra=$_POST["idtblordencompra"];
    $idtblproveedor=$_POST["idtblproveedor"];

    $emailmodifico=$_POST['emailmodifico'];
    $apellido=$_POST['apellido'];
    $nivel=$_POST['nivel'];

    $tabla='Tblentregaproducto';

    //OBTENEMOS TODOS DEL REGISTRO ANTERIOR
    $resultadoRegistroAnterior = getTblentregaproducto($idtblordencompra,$idtblproveedor);
    //SI EL RESULTADO ES EXITOSO SEGUIMOS CON EL PASO DE EXTRACCION DE DATOS
    if($resultadoRegistroAnterior)
    {
        //RECORREMOS EL ARREGLO QUE CONTIENE LA INFORMACION 
        foreach ($resultadoRegistroAnterior as $row)
        {
            //CONCATENAMOS LA INFORMACION PARA OBTENER EL CAMPO DE REGISTRO
            $registroAnterior='id:'.$row["idtblentregaproducto"].
            ' nombreproveedor:'.$row["tblentregaproducto_nombreproveedor"].
            ' fchentrega:'.$row["tblentregaproducto_fchentrega"].
            ' numproductpedidos:'.$row["tblentregaproducto_numproductpedidos"].
            ' numproductentregados:'.$row["tblentregaproducto_numproductentregados"].
            ' status:'.$row["tblentregaproducto_status"].
            ' fchpagoproveedor:'.$row["tblentregaproducto_fchpagoproveedor"].
            ' srcimgevidencia1:'.$row["tblentregaproducto_srcimgevidencia1"].
            ' srcimgevidencia2:'.$row["tblentregaproducto_srcimgevidencia2"].
            ' descripcion:'.$row["tblentregaproducto_descripcion"].
            ' statusdeposito:'.$row["tblentregaproducto_statusdeposito"].
            ' fchmodificacion:'.$row["tblentregaproducto_fchmodificacion"].
            ' fchcreacion:'.$row["tblentregaproducto_fchcreacion"].
            ' emailusuacre:'.$row["tblentregaproducto_emailusuacreo"].
            ' emailusuamodifico:'.$row["tblentregaproducto_emailusuamodifico"].
            ' idtblordencompra:'.$row["tblentregaproducto_idtblordencompra"].
            ' idtblproveedor:'.$row["tblentregaproducto_idtblproveedor"];
        }
    }else
    {
        //SI NO OBTIENE LOS DATOS ASIGNAMOS LAS VARIBLES CON UN MENSAJE DE ERROR PARA QUE NO ESTEN VACIAS
        $registroAnterior="error en la consuta";
    }

    $registroActual=$nombreproveedor.' '.$fchentrega.' '.$numproductpedidos.' '.$numproductentregados.' '.$status.' '.$fchpagoproveedor.' '.$srcimg1.' '.$srcimg2.' '.$emailmodifico.' '.$idtblordencompra.' '.$idtblproveedor;

    $resultadoHistoricoModificacion = FuncionesBePickler::setTblhistoricodemodifi($emailmodifico,$nombreproveedor,$apellido,$nivel,$tabla,$registroAnterior,$registroActual);


    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblentregaproducto($nombreproveedor,$fchentrega,$numproductpedidos,$numproductentregados,$status,$fchpagoproveedor,$srcimg1,$srcimg2,$emailmodifico,$idtblordencompra,$idtblproveedor);

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
unset($nombreproveedor);
unset($fchentrega);
unset($numproductpedidos);
unset($numproductentregados);
unset($status);
unset($fchpagoproveedor);
unset($srcimg1);
unset($srcimg2);
unset($emailmodifico);
unset($idtblordencompra);
unset($idtblproveedor);
unset($resultado);
?>