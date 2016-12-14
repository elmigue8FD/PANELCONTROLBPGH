<?php
/**
 * Recursos utilizados
 */
require './../models/FuncionesBePickler.php';
require './InfoSolicitadaBy.php';
/**
 * Variables Utilizadas
 */
$solicitadoBy   = '';
$idtblcarritoproductcotizador      = '';
$numpersonas     = '';
$fchentrega         = '';
$srcimgproducto       = '';
$idtblordencotizador = '';
$idtblproductcotizador       = '';
$costotienda = '';
$costodomicilio = '';
$emailmodifico  = '';
$idtblmotivocotizacion = '';
$resultado         = '';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $solicitadoBy                    = $_POST["solicitadoBy"];
    $idtblcarritoproductcotizador    = $_POST['idtblcarritoproductcotizador'];
    $numpersonas                     = $_POST['numpersonas'];
    $fchentrega                      = $_POST['fchentrega'];
    $srcimgproducto                  = $_POST['srcimgproducto'];
    $idtblordencotizador             = $_POST['idtblordencotizador'];
    $idtblproductcotizador           = $_POST['idtblproductcotizador'];
    $costotienda                     = $_POST['costotienda'];
    $costodomicilio                  = $_POST['costodomicilio'];    
    $emailmodifico                   = $_POST['emailmodifico'];
    $idtblmotivocotizacion           = $_POST['idtblmotivocotizacion'];

    $emailmodifico                   =$_POST['emailmodifico'];
    $nombreproveedor                 =$_POST['nombreproveedor'];
    $apellido                        =$_POST['apellido'];
    $nivel                           =$_POST['nivel'];

    $tabla='Tblcarritoproductcotizador';

    //OBTENEMOS TODOS DEL REGISTRO ANTERIOR
    $resultadoRegistroAnterior = getTblcarritoproductcotizador($idtblcarritoproductcotizador);
    //SI EL RESULTADO ES EXITOSO SEGUIMOS CON EL PASO DE EXTRACCION DE DATOS
    if($resultadoRegistroAnterior)
    {
        //RECORREMOS EL ARREGLO QUE CONTIENE LA INFORMACION 
        foreach ($resultadoRegistroAnterior as $row)
        {
            //CONCATENAMOS LA INFORMACION PARA OBTENER EL CAMPO DE REGISTRO
            $registroAnterior='id:'.$row["idtblcarritoproductcotizador"].
            ' numpersonas:'.$row["tblcarritoproductcotizador_numpersonas"].
            ' fchentrega:'.$row["tblcarritoproductcotizador_fchentrega"].
            ' srcimg:'.$row["tblcarritoproductcotizador_srcimg"].
            ' costotienda:'.$row["tblcarritoproductcotizador_costotienda"].
            ' costodomicilio:'.$row["tblcarritoproductcotizador_costodomicilio"].
            ' idtblordencotizador:'.$row["tblordencotizador_idtblordencotizador"].
            ' idtblproductcotizador:'.$row["tblproductcotizador_idtblproductcotizador"].
            ' idtblmotivocotizacion:'.$row["tblmotivocotizacion_idtblmotivocotizacion"].
            ' fchmodificacion:'.$row["tblcarritoproductcotizador_fchmodificacion"].
            ' fchcreacion:'.$row["tblcarritoproductcotizador_fchcreacion"].
            ' emailusuacreo:'.$row["tblcarritoproductcotizador_emailusuacreo"].
            ' emailusuamodifico:'.$row["tblcarritoproductcotizador_emailusuamodifico"];
        }
    }else
    {
        //SI NO OBTIENE LOS DATOS ASIGNAMOS LAS VARIBLES CON UN MENSAJE DE ERROR PARA QUE NO ESTEN VACIAS
        $registroAnterior="error en la consuta";
    }

     $registroActual=$idtblcarritoproductcotizador.' '.$numpersonas.' '.$fchentrega.' '.$fchentrega.' '.$fchentrega.' '.$fchentrega.' '.$fchentrega.' '.$fchentrega.' '.$fchentrega;

     $resultadoHistoricoModificacion = FuncionesBePickler::setTblhistoricodemodifi($emailmodifico,$nombreproveedor,$apellido,$nivel,$tabla,$registroAnterior,$registroActual);
    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultado = FuncionesBePickler::setUpdateTblcarritoproductcotizador($idtblcarritoproductcotizador,$numpersonas,$fchentrega,$srcimgproducto,$idtblordencotizador,$idtblproductcotizador,$costotienda,$costodomicilio,$emailmodifico,$idtblmotivocotizacion);

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
unset($idtblcarritoproductcotizador);
unset($numpersonas);
unset($fchentrega);
unset($srcimgproducto);
unset($idtblproductcotizador);
unset($emailmodifico);
unset($resultado);
?>