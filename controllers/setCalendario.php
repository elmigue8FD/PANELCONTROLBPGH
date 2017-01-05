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
$resultado= '';
$nombrearchivo='';
$json_string='';
$file='';
$array='';
$arrayCompleto='';
/**
 * Validamos que el array $_POST no es null.
 */
if (!empty($_POST)){

    $idtblproveedor=$_POST["idtblproveedor"];

    /**
     * Mandamos los parámetros y llamamos a la función que ejecutara la sentencia y retorna el resultado.
     */
    $resultadoOrdenes = FuncionesBePickler::getAllTblordencompraByTbldatosenvio($idtblproveedor);
    $resultadoCotizacionesProduct = FuncionesBePickler::getAllTblordenescotizadorByTblcarritocotizadorByTblproveedor($idtblproveedor);
    $resultadoCotizacionesNuevos=FuncionesBePickler::getAlltblcarritoproductnuevcotiza2();

    $arrayCompleto=[];//array donde guardaran todas las notificaciones

    if($resultadoOrdenes)
    {   //se recorerá el resultado de la consulta para rescatar la ordenes 
        foreach( $resultadoOrdenes as $rowOrden ){ 
            $fechaorden= $rowOrden['tbldatosenvio_fchagendado'].' '.$rowOrden['tbldatosenvio_horaagendado'];
             //$fechaorden= '2016-11-16 09:31:11';
        
            $arrayO = [
                "title" => 'Orden No.'.$rowOrden['idtblordencompra'],
                "start" => $fechaorden,
                "color" => '#DD5465',
                "tipo" => '1'
                ];  
            array_push($arrayCompleto,$arrayO);
        }
    } 

    if($resultadoCotizacionesProduct){
       //CotizacionesProducto
        foreach( $resultadoCotizacionesProduct as $rowCotizador ){ 
            $arrayC = [
                "title" => 'Cotización No.'.$rowCotizador['idtblordencotizador'],
                "start" => $rowCotizador['tblordencotizador_fchcreacion'],
                "color" => '#212121',
                "tipo" => '2'];  
            array_push($arrayCompleto,$arrayC);
        } 
    }

    if($resultadoCotizacionesNuevos){
        foreach( $resultadoCotizacionesNuevos as $rowCotizadorN ){ 
            $arrayCN = [
                "title" => 'Cotización No.'.$rowCotizadorN['idtblordencotizador'],
                "start" => $rowCotizadorN['tblordencotizador_fchcreacion'],
                "color" => '#212121',
                "tipo" => '2'];  
            array_push($arrayCompleto,$arrayCN);
        } 

    }    

    //Creamos el JSON
    $json_string = json_encode($arrayCompleto);
    $nombrearchivo= 'calendarioproveedor_'.$idtblproveedor.'.json';
    $file = "./../views/PANELCONTROL/assets/calendariojson/".$nombrearchivo;
    file_put_contents($file, $json_string);
}
/**
 * Desctruimos las variables para liberar memoria
 */
unset($solicitadoBy);
unset($idtblproveedor);
unset($resultado);
?>